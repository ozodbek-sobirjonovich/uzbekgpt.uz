<?php

namespace App\Http\Controllers;

use App\Models\OpenAIGenerator;
use App\Models\Setting;
use App\Models\UserOpenai;
use App\Models\UserOpenaiChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;


class AIController extends Controller
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

    public function buildOutput(Request $request){
        $user = Auth::user();

        $post_type = $request->post_type;

        //SETTINGS
        $number_of_results = $request->number_of_results;
        $maximum_length = $request->maximum_length;
        $creativity = $request->creativity;
        $language = $request->language;

        $tone_of_voice = $request->tone_of_voice;

        //POST TITLE GENERATOR
        if ($post_type == 'post_title_generator'){
            $your_description = $request->your_description;
            $prompt = "Post title about $your_description in $language";
        }


        //ARTICLE GENERATOR
        if ($post_type == 'article_generator'){
            $article_title = $request->article_title;
            $focus_keywords = $request->focus_keywords; //Virgül ile ayrılmış
            $prompt = "Generate article about $article_title. Focus on $focus_keywords. Tone $tone_of_voice. Length $maximum_length words. In $language.Give $number_of_results results.";
        }

        //SUMMARY GENERATOR SUMMARIZER SUMMARIZE TEXT
        if ($post_type == 'summarize_text'){
            $text_to_summary = $request->text_to_summary;
            $tone_of_voice = $request->tone_of_voice;

            $prompt = 'Summarize the following text: ' .
                $text_to_summary . ' in ' .
                $language . ' using a tone of voice that is ' .
                $tone_of_voice . '. The summary should be no longer than ' .
                $maximum_length . ' words and be ' .
                $creativity . ' in terms of creativity. Generate ' .
                $number_of_results . ' different summaries.';
        }

        //PRODUCT DESCRIPTION
        if ($post_type == 'product_description'){
            $product_name = $request->product_name;
            $description = $request->description;

            $prompt = 'Write ' .
                $number_of_results . ' product descriptions for ' .
                $product_name . '. The descriptions should be written in ' .
                $language . ' and be no longer than ' .
                $maximum_length . ' words. Be creative and come up with unique descriptions for each product. Use the following information as a starting point: ' .
                $description . '.';
        }

        //PRODUCT NAME
        if ($post_type == 'product_name'){
            $seed_words = $request->seed_words;
            $product_description = $request->product_description;

            $prompt = 'Generate ' .
                $number_of_results . ' product names that will appeal to customers who are interested in ' .
                $seed_words . '. These products should be related to ' .
                $product_description . ' and should be no longer than ' .
                $maximum_length . ' words. The names should be written in ' .
                $language . ' and should be creative and memorable. Use the following information as a starting point: ';
        }

        //TESTIMONIAL REVIEW GENERATOR
        if ($post_type == 'testimonial_review'){
            $subject = $request->subject;

            $prompt = "Generate
                $number_of_results testimonials for
                $subject.
                $description Please write a short testimonial about your
                experience with Product X. Include details about how it helped
                you and what you like best about it. Be honest and specific, and feel
                free to get creative with your wording. maximum $maximum_length words";
        }

        //PROBLEM AGITATE SOLUTION
        if ($post_type == 'problem_agitate_solution'){
            $description = $request->description;

            $prompt = 'write Problem-Agitate-Solution copy for the' .
                $description. 'in '.
                $language.' language and the maximum words should be '.
                $maximum_length;
        }

        //BLOG SECTION
        if ($post_type == 'blog_section'){
            $description = $request->description;

            $prompt = 'write blog section about'.
                $description. 'in' .
                $language. 'language. The tone of voice should be'.
                $tone_of_voice.' and the maximum words should be'.
                $maximum_length. ' words and should be subtitles';
        }

        //BLOG POST IDEAS
        if ($post_type == 'blog_post_ideas'){
            $description = $request->description;

            $prompt = 'write blog post article ideas about'.
                $description. 'in' .
                $language. ' language. The tone of voice should be'.
                $tone_of_voice .'and the maximum words should be'.
                $maximum_length. 'words';
        }

        //BLOG INTROS
        if ($post_type == 'blog_intros'){
            $title = $request->title;
            $description = $request->description;

            $prompt = 'write blog post intro about title: '.
                $title.', content: '.
                $description.' airport in'.
                $language.' language. The tone of voice should be '.
                $tone_of_voice.' and the maximum words should be '.
                $maximum_length.' words';
        }

        //BLOG CONCLUSION
        if ($post_type == 'blog_conclusion'){
            $title = $request->title;
            $description = $request->description;

            $prompt = 'write blog post conclusion about title: '.
                $title.', content: '.
                $description.' airport in '.
                $language.' language. The tone of voice should be '.
                $tone_of_voice.' and the maximum words should be '.
                $maximum_length.' words';
        }


        //FACEBOOK ADS
        if ($post_type == 'facebook_ads'){
            $title = $request->title;
            $description = $request->description;

            $prompt ='write facebook ads text about title: '.
                $title.', description: '.
                $description . ' in '.
                $language.' language. The tone of voice should be '.
                $tone_of_voice.' and short paragraph';
        }

        //YOUTUBE VIDEO DESCRIPTION
        if ($post_type == 'youtube_video_description'){
            $title = $request->title;

            $prompt = "write youtube video description about
                $title in
                $language. The tone of voice should be
                $tone_of_voice and maximum words should be
                $maximum_length words";
        }

        //YOUTUBE VIDEO TITLE
        if ($post_type == 'youtube_video_title'){
            $description = $request->description;

            $prompt = "write youtube video title about
                $description  in
                $language language.
                and maximum words should be
                $maximum_length words";
        }

        //YOUTUBE VIDEO TAG
        if ($post_type == 'youtube_video_tag'){
            $title = $request->title;

            $prompt = "generate tags and keywords about
                $title for youtube video in
                $language language.
                and maximum length should be
                $maximum_length words";
        }

        //INSTAGRAM CAPTIONS
        if ($post_type == 'instagram_captions'){
            $title = $request->title;

            $prompt = "write instagram post caption about
                $title in
                $language language as list (maximum 6)
                and maximum length should be
                $maximum_length words";
        }

        //INSTAGRAM HASHTAG
        if ($post_type == 'instagram_hashtag'){
            $keywords = $request->keywords;

            $prompt = "generate instagram hastags for
                $keywords in
                $language language.
                and maximum length should be
                $maximum_length words";
        }

        //SOCIAL MEDIA POST TWEET
        if ($post_type == 'social_media_post_tweet'){
            $title = $request->title;

            $prompt = "Write in 1st person tweet about
                $title in
                $language language. The tone of voice should be
                $tone_of_voice and maximum length should be
                $maximum_length words";
        }

        //SOCIAL MEDIA POST BUSINESS
        if ($post_type == 'social_media_post_business'){
            $company_name = $request->company_name;
            $provide = $request->provide;

            $prompt = "Write in company social media post, company name:
                $company_name, about:
                $description in
                $language language and maximum length should be
                $maximum_length words";
        }

        //FACEBOOK HEADLINES
        if ($post_type == 'facebook_headlines'){
            $title = $request->title;
            $description = $request->description;

            $prompt = "write ads title about title:
                $title,  description:
                $description in
                $language language
                and maximum length should be
                $maximum_length words";
        }

        //GOOGLE ADS HEADLINES
        if ($post_type == 'google_ads_headlines'){
            $product_name = $request->product_name;
            $description = $request->description;
            $audience = $request->audience;

            $prompt = "write ads headline product name:
                $product_name, audience: $audience, description:
                $description in
                $language language and maximum length should be
                $maximum_length words";
        }

        //GOOGLE ADS DESCRIPTION
        if ($post_type == 'google_ads_description'){
            $product_name = $request->product_name;
            $description = $request->description;
            $audience = $request->audience;

            $prompt = "write google ads description product name:
            $product_name, audience:
            $audience, description:
            $description in
            $language language no keywords. The tone of voice should be
            $tone_of_voice and maximum length should be
            $maximum_length words";
        }

        //CONTENT REWRITE
        if ($post_type == 'content_rewrite'){
            $contents = $request->contents;

            $prompt = "rewrite content, the tone of voice should be
            $tone_of_voice, in
            $language language and the maximum length
            $maximum_length words. Content:
            $contents ";
        }

        //PARAGRAPH GENERATOR
        if ($post_type == 'paragraph_generator'){
            $description = $request->description;
            $keywords = $request->keywords;

            $prompt = "generate one paragraph about
            $description related keywords:
            $keywords in
            $language language. The tone of voice should be
            $tone_of_voice and maximum lenght
            $maximum_length words";
        }

        //Pros & Cons
        if ($post_type == 'pros_cons'){
            $title = $request->title;
            $description = $request->description;

            $prompt = "generate pros & cons about title:
            $title, description:
            $description in
            $language language. The tone of voice should be
            $tone_of_voice and maximum length
            $maximum_length words";
        }

        // META DESCRIPTION
        if ($post_type == 'meta_description'){
            $title = $request->title;
            $description = $request->description;
            $keywords = $request->keywords;

            $prompt = "generate website meta description site name:
            $title, description:
            $description, keywords:
            $keywords in
            $language language. maximum length
            $maximum_length words";
        }

        // FAQ Generator (All datas)
        if ($post_type == 'faq_generator'){
            $title = $request->title;
            $description = $request->description;

            $prompt = "answer like faq about subject:
            $title, description:
            $description. The tone of voice should be
            $tone_of_voice and maximum length
            $maximum_length words";
        }

        // Email Generator
        if ($post_type == 'email_generator'){
            $subject = $request->subject;
            $description = $request->description;

            $prompt = "write email about title:
            $subject, description:
            $description in
            $language language. The tone of voice should be
            $tone_of_voice and the maximum length
            $maximum_length words";
        }

        // Email Answer Generator
        if ($post_type == 'email_answer_generator'){
            $description = $request->description;

            $prompt = "answer this email content:
            $description in
            $language language. The tone of voice should be
            $tone_of_voice and the maximum length
            $maximum_length words";
        }

        // Newsletter Generator
        if ($post_type == 'newsletter_generator'){
            $description = $request->description;
            $subject = $request->subject;
            $title = $request->title;

            $prompt = "generate newsletter template about product_title:
            $title, reason:
            $subject description:
            $description in
            $language language. The tone of voice
            $tone_of_voice and the maximum length
            $maximum_length words";
        }

        // Grammar Correction
        if ($post_type == 'grammar_correction'){
            $description = $request->description;

            $prompt = "Correct this to standard
            $language. Maximum length should be
            $maximum_length words. Text:
            $description";
        }

        // TL;DR summarization
        if ($post_type == 'tldr_summarization'){
            $description = $request->description;

            $prompt = "
            $description. Tl;dr
            $language language. And the maximum length
            $maximum_length words";
        }


        if ($post_type == 'ai_image_generator'){
            $description = $request->description;
            $prompt = "$description";
            $size = $request->size;
        }

        if ($post_type == 'ai_code_generator'){
            $description = $request->description;
            $code_language = $request->code_language;
            $prompt = "Write a code about $description, in $code_language";
        }

        if ($request->custom_template == 1){
            $custom_template = OpenAIGenerator::where('id', $request->openai_id)->first();
            $prompt = $custom_template->prompt;
            foreach(json_decode($custom_template->questions) as $question){
                $question_name = '**'.$question->name.'**';
                $prompt = str_replace($question_name, $request[$question->name], $prompt);
            }

            $prompt.= " in $language language. And the maximum length of $maximum_length words";
        }

        $post = OpenAIGenerator::where('slug', $post_type)->first();

        if ($post->type == 'text'){
            return $this->textOutput($prompt, $post, $creativity, $maximum_length, $number_of_results, $user);
        }

        if ($post->type == 'code'){
            return $this->codeOutput($prompt, $post, $user);
        }

        if ($post->type == 'image'){
            return $this->imageOutput($prompt, $size, $post, $user);
        }

        if ($post->type =='audio'){
            $file = $request->file('file');
            return $this->audioOutput($file, $post, $user);
        }
    }

    public function streamedTextOutput(Request $request){
        $settings = $this->settings;
        $message_id = $request->message_id;
        $message = UserOpenai::whereId($message_id)->first();
        $prompt = $message->input;

        $creativity = $request->creativity;
        $maximum_length = $request->maximum_length;
        $number_of_results = $request->number_of_results;

        return response()->stream(function () use($prompt, $message_id, $settings, $creativity, $maximum_length, $number_of_results) {
            if ($settings->openai_default_model == 'gpt-3.5-turbo'){
                $stream = OpenAI::chat()->createStreamed([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    "presence_penalty" => 0.6,
                    "frequency_penalty" => 0,
                ]);
            }else{
                $stream = OpenAI::completions()->createStreamed([
                    'model' => 'text-davinci-003',
                    'prompt' => $prompt,
                    'temperature' => (int)$creativity,
                    'max_tokens' => (int)$maximum_length,
                    'n' => (int)$number_of_results
                ]);
            }

            $total_used_tokens = 0;
            $output = "";
            $responsedText = "";

            foreach ($stream as $response){
                if ($settings->openai_default_model == 'gpt-3.5-turbo') {
                    if (isset($response['choices'][0]['delta']['content'])) {
                        $message = $response['choices'][0]['delta']['content'];
                        $messageFix = str_replace(["\r\n", "\r", "\n"], "<br/>", $message);
                        $output .= $messageFix;
                        $responsedText .= $message;
                        $total_used_tokens += Str::of($messageFix)->wordCount();
                        echo 'data: ' . $messageFix . str_repeat('q12', 1024 * 2) . "\n\n";
                        ob_flush();
                        flush();
                        usleep(40000);
                    }
                }else{
                    if (isset($response->choices[0]->text)){
                        $message = $response->choices[0]->text;
                        $messageFix = str_replace(["\r\n", "\r", "\n"], "<br/>", $message);
                        $output .= $messageFix;
                        $responsedText .= $message;
                        $total_used_tokens += Str::of($messageFix)->wordCount();
                        echo 'data: ' . $messageFix . str_repeat('q12', 1024 * 2) . "\n\n";
                        ob_flush();
                        flush();
                        usleep(40000);
                    }
                }

                if (connection_aborted()) {
                    break;
                }
            }


            $message = UserOpenai::whereId($message_id)->first();
            $message->response = $responsedText;
            $message->output = $output;
            $message->hash = Str::random(256);
            $message->credits = $total_used_tokens;
            $message->words = 0;
            $message->save();

            $user = Auth::user();
            $user->remaining_words -= $total_used_tokens;
            $user->save();

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
    }

    public function textOutput($prompt, $post, $creativity, $maximum_length, $number_of_results, $user){
            $user = Auth::user();
            if ($user->remaining_words <= 0 ){
                $data = array(
                    'errors' => ['You have no credits left. Please consider upgrading your plan.'],
                );
                return response()->json($data, 419);
            }
            $entry = new UserOpenai();
            $entry->title = 'New Workbook';
            $entry->slug = Str::random(7).Str::slug($user->fullName()).'-workbook';
            $entry->user_id = Auth::id();
            $entry->openai_id = $post->id;
            $entry->input = $prompt;
            $entry->response = null;
            $entry->output = null;
            $entry->hash = Str::random(256);
            $entry->credits = 0;
            $entry->words = 0;
            $entry->save();

            $message_id = $entry->id;
            $workbook = $entry;
            $html = view('panel.user.openai.documents_workbook_textarea', compact('workbook'))->render();
            return response()->json(compact( 'message_id', 'html', 'creativity', 'maximum_length', 'number_of_results'));

    }

    public function codeOutput($prompt, $post, $user){
        if ($this->settings->openai_default_model == 'gpt-3.5-turbo') {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);


        } else {
            $response = OpenAI::completions()->create([
                'model' => $this->settings->openai_default_model,
                'prompt' => $prompt,
                'max_tokens' => (int)$this->settings->openai_max_output_length,
            ]);
        }

        $total_used_tokens = $response->usage->totalTokens;


        $entry = new UserOpenai();
        $entry->title = 'New Workbook';
        $entry->slug = Str::random(7).Str::slug($user->fullName()).'-workbook';
        $entry->user_id = Auth::id();
        $entry->openai_id = $post->id;
        $entry->input = $prompt;
        $entry->response = json_encode($response->toArray());
        if ($this->settings->openai_default_model == 'gpt-3.5-turbo') {
            $entry->output = $response->choices[0]->message->content;
        }else{
            $entry->output = $response['choices'][0]['text'];
        }
        $entry->hash = Str::random(256);
        $entry->credits = $total_used_tokens;
        $entry->words = 0;
        $entry->save();

        $user->remaining_words -= $total_used_tokens;
        $user->save();
        return $this->finalizeOutput($post, $entry);

    }

    public function imageOutput($prompt, $size, $post, $user){
        $response = OpenAI::images()->create([
            'model' => 'image-alpha-001',
            'prompt' => $prompt,
            'size' => $size,
            'response_format' => 'b64_json',
        ]);

        $image_url = $response['data'][0]['b64_json'];

        $contents = base64_decode($image_url);
        $nameOfImage = Str::random(12).'-'.Str::slug($prompt).'.png';
        Storage::disk('public')->put($nameOfImage, $contents);

        $entry = new UserOpenai();
        $entry->title = 'New Workbook';
        $entry->slug = Str::random(7).Str::slug($user->fullName()).'-workbook';
        $entry->user_id = Auth::id();
        $entry->openai_id = $post->id;
        $entry->input = $prompt;
        $entry->response = null;
        $entry->output = '/uploads/'.$nameOfImage;
        $entry->hash = Str::random(256);
        $entry->credits = 1;
        $entry->words = 0;
        $entry->save();

        $user->remaining_images -= 1;
        $user->save();
        return $this->finalizeOutput($post, $entry);

    }

    public function audioOutput($file, $post, $user){

        $path = 'upload/audio/';

        $file_name = Str::random(4).'-'.Str::slug($user->fullName()).'-audio.'.$file->getClientOriginalExtension();

        //Audio Extension Control
        $imageTypes = ['mp3','mp4','mpeg','mpga', 'm4a', 'wav', 'webm'];
        if (!in_array(Str::lower($file->getClientOriginalExtension()), $imageTypes)){
            $data = array(
                'errors' => ['Invalid extension, accepted extensions are mp3, mp4, mpeg, mpga, m4a, wav, and webm.'],
            );
            return response()->json($data, 419);
        }

        $file->move($path, $file_name);

        $response = OpenAI::audio()->transcribe([
            'file' => fopen($path.$file_name, 'r'),
            'model' => 'whisper-1',
            'response_format' => 'verbose_json',
        ]);

        $text  = $response->text;

        $entry = new UserOpenai();
        $entry->title = 'New Workbook';
        $entry->slug = Str::random(7).Str::slug($user->fullName()).'-speech-to-text-workbook';
        $entry->user_id = Auth::id();
        $entry->openai_id = $post->id;
        $entry->input = $path.$file_name;
        $entry->response = json_encode($response->toArray());
        $entry->output = $text;
        $entry->hash = Str::random(256);
        $entry->credits = Str::of($text)->wordCount();
        $entry->words = Str::of($text)->wordCount();
        $entry->save();

        $user->remaining_words -= $entry->credits;
        $user->save();
        //Workbook add-on
        $workbook = $entry;

        $userOpenai = UserOpenai::where('user_id', Auth::id())->where('openai_id', $post->id)->orderBy('created_at', 'desc')->get();
        $openai = OpenAIGenerator::where('id', $post->id)->first();
        $html2 = view('panel.user.openai.generator_components.generator_sidebar_table', compact('userOpenai', 'openai'))->render();
        return response()->json(compact('html2'));
    }

    public function finalizeOutput($post, $entry){
        //Workbook add-on
        $workbook = $entry;

        $html = view('panel.user.openai.documents_workbook_textarea', compact('workbook'))->render();
        $userOpenai = UserOpenai::where('user_id', Auth::id())->where('openai_id', $post->id)->orderBy('created_at', 'desc')->get();
        $openai = OpenAIGenerator::where('id', $post->id)->first();
        $html2 = view('panel.user.openai.generator_components.generator_sidebar_table', compact('userOpenai', 'openai'))->render();
        return response()->json(compact('html', 'html2'));
    }



}
