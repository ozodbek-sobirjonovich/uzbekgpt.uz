<?php

namespace App\Http\Controllers;

use App\Models\OpenaiGeneratorChatCategory;
use App\Models\Setting;
use App\Models\UserOpenaiChat;
use App\Models\UserOpenaiChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;

class AIChatController extends Controller
{
    protected $client;
    protected $settings;

    public function __construct()
    {
        //Settings
        $this->settings = Setting::first();
        // Fetch the Site Settings object with openai_api_secret
        config(['openai.api_key' => $this->settings->openai_api_secret]);
        //$this->client = OpenAI::client($this->settings->openai_api_secret);
    }

    public function openAIChatList(){
        $aiList = OpenaiGeneratorChatCategory::all();
        return view('panel.user.openai_chat.list', compact('aiList'));
    }

    public function openAIChat($slug){
        $category = OpenaiGeneratorChatCategory::whereSlug($slug)->firstOrFail();
        $list = UserOpenaiChat::where('user_id', Auth::id())->where('openai_chat_category_id', $category->id)->orderBy('updated_at', 'desc');
        $list = $list->get();
        $chat = $list->first();
        $aiList = OpenaiGeneratorChatCategory::all();

        return view('panel.user.openai_chat.chat', compact('category', 'list', 'chat', 'aiList'));
    }

    public function openChatAreaContainer(Request $request){
        $chat =  UserOpenaiChat::where('id', $request->chat_id)->first();
        $category = $chat->category;
        $html = view('panel.user.openai_chat.components.chat_area_container', compact('chat','category'))->render();
        return response()->json(compact('html'));
    }

    public function startNewChat(Request $request){
        $category = OpenaiGeneratorChatCategory::where('id', $request->category_id)->firstOrFail();
        $chat = new UserOpenaiChat();
        $chat->user_id = Auth::id();
        $chat->openai_chat_category_id = $category->id;
        $chat->title = $category->name.' Chat';
        $chat->total_credits = 0;
        $chat->total_words = 0;
        $chat->save();

        $message = new UserOpenaiChatMessage();
        $message->user_openai_chat_id = $chat->id;
        $message->user_id = Auth::id();
        $message->response = 'First Initiation';
        if ($category->role == 'default'){
            $output =  "Hi! I am .$category->name, and I'm here to answer your all questions";
        }else{
            $output =  "Hi! I am $category->human_name, and I'm $category->role. $category->helps_with";
        }
        $message->output = $output;
        $message->hash = Str::random(256);
        $message->credits = 0;
        $message->words = 0;
        $message->save();

        $list = UserOpenaiChat::where('user_id', Auth::id())->where('openai_chat_category_id', $category->id)->orderBy('updated_at', 'desc')->get();

        $html = view('panel.user.openai_chat.components.chat_area_container', compact('chat', 'category' ))->render();
        $html2 = view('panel.user.openai_chat.components.chat_sidebar_list', compact('list', 'chat' ))->render();
        return response()->json(compact('html', 'html2'));
    }

    public function chatOutput(Request $request){
        if ($request->isMethod('get')){

            $chat_id = $request->chat_id;
            $message_id = $request->message_id;
            $user_id = Auth::id();

            $message = UserOpenaiChatMessage::whereId($message_id)->first();
            $prompt = $message->input;
            $chat = UserOpenaiChat::whereId($chat_id)->first();
            $lastThreeMessageQuery = $chat->messages()->whereNot('input', null)->orderBy('created_at', 'desc')->take(4);
            $lastThreeMessage = $lastThreeMessageQuery->get()->reverse();
            $i = 0;
            $history[] = ["role" => "system", "content" => "You are a helpful assistant."];
            if (count($lastThreeMessage)>1){
                foreach ($lastThreeMessage as $threeMessage){
                    $history[] = ["role" => "user", "content" => $threeMessage->input];
                    if ($threeMessage->response != null){
                        $history[] = ["role" => "assistant", "content" => $threeMessage->response];
                    }
                }
            }else{
                $history[] = ["role" => "user", "content" => $prompt];
            }

            return response()->stream(function () use($prompt, $chat_id,  $message_id, $history) {


                $stream = OpenAI::chat()->createStreamed([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => $history,
                    "presence_penalty" => 0.6,
                    "frequency_penalty" => 0,
                ]);

                $total_used_tokens = 0;
                $output = "";
                $responsedText = "";

                foreach ($stream as $response){
                    if (isset($response['choices'][0]['delta']['content'])){

                        $message = $response['choices'][0]['delta']['content'];
                        $messageFix = str_replace(["\r\n", "\r", "\n"], "<br/>", $message);
                        $output .= $messageFix;
                        $responsedText .= $message;
                        $total_used_tokens += Str::of($message)->wordCount();
                        echo 'data: ' . $messageFix.str_repeat('q12',1024*2)."\n\n";
                        ob_flush();
                        flush();
                        usleep(40000);
                    }
                    if (connection_aborted()) {
                        break;
                    }
                }
                $message = UserOpenaiChatMessage::whereId($message_id)->first();
                $chat = UserOpenaiChat::whereId($chat_id)->first();
                $message->response = $responsedText;
                $message->output = $output;
                $message->hash = Str::random(256);
                $message->credits = $total_used_tokens;
                $message->words = 0;
                $message->save();

                $user = Auth::user();
                $user->remaining_words -= $total_used_tokens;
                $user->save();

                $chat->total_credits += $total_used_tokens;
                $chat->save();
                echo 'data: [DONE]';
                echo "\n\n";
                ob_flush();
                flush();
                usleep(50000);
                ob_end_flush();
            }, 200, [
                'Cache-Control' => 'no-cache',
                'X-Accel-Buffering' => 'no',
                'Content-Type' => 'text/event-stream',
            ]);
        }else{

            $chat = UserOpenaiChat::where('id', $request->chat_id)->first();
            $category = OpenaiGeneratorChatCategory::where('id', $request->category_id)->first();

            $user = Auth::user();
            if ($user->remaining_words <= 0 ){
                $data = array(
                    'errors' => ['You have no credits left. Please consider upgrading your plan.'],
                );
                return response()->json($data, 419);
            }
            $prompt = $request->prompt;



            $total_used_tokens = 0;

            $entry = new UserOpenaiChatMessage();
            $entry->user_id = Auth::id();
            $entry->user_openai_chat_id = $chat->id;
            $entry->input = $prompt;
            $entry->response = null;
            $entry->output = 'Preparing Answer... (If you see this please try to send your message again.)';
            $entry->hash = Str::random(256);
            $entry->credits = $total_used_tokens;
            $entry->words = 0;
            $entry->save();

            $user->remaining_words -= $total_used_tokens;
            $user->save();

            $chat->total_credits += $total_used_tokens;
            $chat->save();

            $chat_id = $chat->id;
            $message_id = $entry->id;

            return response()->json(compact('chat_id', 'message_id'));
        }

    }



}
