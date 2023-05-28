<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\OpenAIGenerator;
use App\Models\OpenaiGeneratorFilter;
use App\Models\PaymentPlans;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserAffiliate;
use App\Models\UserOpenai;
use App\Models\UserOpenaiChat;
use App\Models\UserOpenaiChatMessage;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Subscription;

class AdminController extends Controller
{
    public function index(){
        Cache::flush();

        if (
               !Cache::has('sales_this_week')
            or !Cache::has('sales_previous_week')
            or !Cache::has('words_this_week')
            or !Cache::has('words_previous_week')
            or !Cache::has('images_this_week')
            or !Cache::has('images_previous_week')
            or !Cache::has('users_this_week')
            or !Cache::has('users_previous_week')
            or !Cache::has('chat_tokens')
            or !Cache::has('daily_sales')
            or !Cache::has('daily_usages')
            or !Cache::has('top_countries')
            or !Cache::has('total_users')
            or !Cache::has('total_sales')
            or !Cache::has('total_usage')
        ) {
            //Sales this week
            $sales_this_week = UserOrder::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price');
            Cache::put('sales_this_week', $sales_this_week, now()->addMinutes(360));
            //Sales previous week
            $sales_previous_week = UserOrder::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->sum('price');
            Cache::put('sales_previous_week', $sales_previous_week, now()->addMinutes(360));
            //Words this week
            $words_this_week = UserOpenai::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('credits', '!=', 1)->sum('credits');
            Cache::put('words_this_week', $words_this_week, now()->addMinutes(360));
            //Words previous week
            $words_previous_week = UserOpenai::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->where('credits', '!=', 1)->sum('credits');
            Cache::put('words_previous_week', $words_previous_week, now()->addMinutes(360));
            //Images this week
            $images_this_week = UserOpenai::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('credits', '==', 1)->sum('credits');
            Cache::put('images_this_week', $images_this_week, now()->addMinutes(360));
            //Images previous week
            $images_previous_week = UserOpenai::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->where('credits', '==', 1)->sum('credits');
            Cache::put('images_previous_week', $images_previous_week, now()->addMinutes(360));

            //user change
            $users_this_week = count(User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
            Cache::put('users_this_week', $users_this_week, now()->addMinutes(360));
            $users_previous_week = count(UserOpenai::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->get());
            Cache::put('users_previous_week', $users_previous_week, now()->addMinutes(360));

            //Chat tokens
            $chat_tokens = UserOpenaiChatMessage::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('credits');
            Cache::put('chat_tokens', $chat_tokens, now()->addMinutes(360));
            //Daily sales
            $daily_sales = UserOrder::select(
                DB::raw('sum(price) as sums'),
                DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as days")
            )
                ->groupBy('days')
                ->get();
            Cache::put('daily_sales', json_encode($daily_sales), now()->addMinutes(360));
            $total_sales = UserOrder::all()->sum('price');
            Cache::put('total_sales', $total_sales, now()->addMinutes(360));
            //Usages
            $daily_usages = UserOpenai::select(
                DB::raw('SUM(IF(credits=1,credits,0)) as sumsImage'),
                DB::raw('SUM(IF(credits>1,credits,0)) as sumsWord'),
                DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as days")
            )
                ->groupBy('days')
                ->get();
            Cache::put('daily_usages', json_encode($daily_usages), now()->addMinutes(360));
            $total_usage = UserOpenai::all()->sum('credits');
            Cache::put('total_usage', $total_usage, now()->addMinutes(360));
            //Top Countries
            $top_countries = User::select('country', DB::raw('count(*) as total'))
                ->groupBy('country')
                ->get();
            Cache::put('top_countries', json_encode($top_countries), now()->addMinutes(360));
            //Total Users
            Cache::put('total_users', count(User::all()), now()->addMinutes(360));
        }
        //Variables
        $activity = Activity::orderBy('created_at', 'desc')->get();
        $latestOrders = UserOrder::orderBy('created_at', 'desc')->take(10)->get();
        return view('panel.admin.index', compact('activity', 'latestOrders'));
    }

    //USER MANAGEMENT
    public function users(){
        $users = User::all();
        return view('panel.admin.users.index', compact('users'));
    }

    public function usersEdit($id){
        $user = User::whereId($id)->firstOrFail();
        return view('panel.admin.users.edit', compact('user'));
    }

    public function usersSave(Request $request){
        $user = User::whereId($request->user_id)->firstOrFail();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->remaining_words = $request->remaining_words;
        $user->remaining_images = $request->remaining_images;
        $user->save();
    }

    //OPENAI MANAGEMENT
    public function openAIList(){
        $list = OpenAIGenerator::orderBy('title', 'asc')->get();
        return view('panel.admin.openai.list', compact('list'));
    }

    public function openAIListUpdateStatus(Request $request){
        $status = $request->status;
        $openai = OpenAIGenerator::whereId($request->entry_id)->first();
        if ($status  == 1 or $status == 0){
            $openai->active = $status;
            $openai->save();
        }else{
            return response()->json([], 403);
        }

    }

    //OPENAI CUSTOM TEMPLATES
    public function openAICustomList(){
        $list = OpenAIGenerator::orderBy('title', 'asc')->where('custom_template', 1)->get();
        return view('panel.admin.openai.custom.list', compact('list'));
    }

    public function openAICustomAddOrUpdate($id = null){
        if ($id == null){
            $template = null;
        }else{
            $template = OpenAIGenerator::where('id', $id)->firstOrFail();
        }
        $filters = OpenaiGeneratorFilter::orderBy('name', 'desc')->get();
        return view('panel.admin.openai.custom.form', compact('template', 'filters'));
    }

    public function openAICustomDelete($id = null){
        $template = OpenAIGenerator::where('id', $id)->firstOrFail();
        $template->delete();
        return back()->with(['message' => 'Deleted Succesfullt', 'type' => 'success']);
    }

    public function openAICustomAddOrUpdateSave(Request $request){

        if ($request->template_id != 'undefined'){
            $template = OpenAIGenerator::where('id', $request->template_id)->firstOrFail();
        }else{
            $template = new OpenAIGenerator();
        }

        $template->title = $request->title;
        $template->description = $request->description;
        $template->image = $request->image;
        $template->color = $request->color;
        $template->prompt = $request->prompt;

        $inputNames = explode( ',', $request->input_name);
        $inputDescriptions = explode( ',', $request->input_description);
        $inputTypes = explode( ',', $request->input_type);

        $i = 0;
        $array = [];
        foreach ($inputNames as $inputName){
            $array[$i]['name'] = Str::slug($inputName);
            $array[$i]['type'] = $inputTypes[$i];
            $array[$i]['question'] = $inputName;
            $array[$i]['description'] = $inputDescriptions[$i];
            $i++;
        }

        $questions = json_encode($array,JSON_UNESCAPED_SLASHES);
        $template->active = 1;
        $template->slug = Str::slug($request->title).'-'.Str::random(6);
        $template->questions = $questions;
        $template->type = 'text';
        $template->custom_template = 1;
        $template->filters = $request->filters;
        $template->save();
    }

    //FINANCE

    //Payment

    public function paymentPlans(){
        $plans = PaymentPlans::all();
        return view('panel.admin.finance.plans.index', compact('plans'));
    }

    public function paymentPlansSubscriptionNewOrEdit($id = null){
        if ($id == null){
            return view('panel.admin.finance.plans.SubscriptionNewOrEdit');
        }else{
            $subscription = PaymentPlans::where('id', $id)->first();
            return view('panel.admin.finance.plans.SubscriptionNewOrEdit', compact('subscription'));
        }
    }

    public function paymentPlansDelete($id){
        $plan = PaymentPlans::where('id', $id)->first();
        $userIds = Subscription::where('plan_id', $plan->id)->where('stripe_status', 'active')->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get();
        $settings = Setting::first();
        config(['cashier.key' => $settings->stripe_key]);
        config(['cashier.secret' => $settings->stripe_secret]);
        config(['cashier.currency' => currency()->code]);
        foreach ($users as $user){
            $user->subscription($plan->id)->cancelNow();
            $user->remaining_words = 0;
            $user->remaining_images = 0;
            $user->save();
        }
        $plan->delete();
        return back()->with(['message' => 'All subscriptions related to this plan has been cancelled. Plan is deleted.', 'type' => 'success']);
    }

    public function paymentPlansPrepaidNewOrEdit($id = null){
        if ($id == null){
            return view('panel.admin.finance.plans.PrepaidNewOrEdit');
        }else{
            $subscription = PaymentPlans::where('id', $id)->first();
            return view('panel.admin.finance.plans.PrepaidNewOrEdit', compact('subscription'));
        }
    }


    public function paymentPlansSave(Request $request){
        if ($request->plan_id != 'undefined'){
            $plan = PaymentPlans::where('id', $request->plan_id)->firstOrFail();
        }else{
            $plan = new PaymentPlans();
        }

        if ($request->type == 'subscription'){

        $plan->active = 1;
        $plan->name = $request->name;
        $plan->price = (int)$request->price;
        $plan->frequency = $request->frequency;
        $plan->is_featured = (int)$request->is_featured;
        $plan->stripe_product_id = $request->stripe_product_id;
        $plan->total_words = (int)$request->total_words;
        $plan->total_images = (int)$request->total_images;
        $plan->ai_name = $request->ai_name;
        $plan->max_tokens = (int)$request->max_tokens;
        $plan->can_create_ai_images = (int)$request->can_create_ai_images;
        $plan->plan_type = $request->plan_type;
        $plan->features = $request->features;
        $plan->type = $request->type;
        $plan->save();

        }else{
            $plan->active = 1;
            $plan->name = $request->name;
            $plan->price = (int)$request->price;
            $plan->is_featured = (int)$request->is_featured;
            $plan->total_words = (int)$request->total_words;
            $plan->total_images = (int)$request->total_images;
            $plan->features = $request->features;
            $plan->type = $request->type;
            $plan->save();
        }

    }

    //Affiliates
    public function affiliatesList(){
        $list = UserAffiliate::where('status', 'Waiting')->get();
        $list2 = UserAffiliate::whereNot('status', 'Waiting')->get();
        return view('panel.admin.affiliate.index', compact('list', 'list2'));
    }
    public function affiliatesListSent($id){
        $item = UserAffiliate::whereId($id)->firstOrFail();
        $item->status = 'Sent Succesfully';
        $item->save();
        return back();
    }
    //Frontend
    public function frontendSettings(){
        return view('panel.admin.frontend.settings');
    }
    public function frontendSettingsSave(Request $request){
        $settings = Setting::first();
        $settings->site_name = $request->site_name;
        $settings->site_url = $request->site_url;
        $settings->site_email = $request->site_email;
        $settings->google_analytics_code = $request->google_analytics_code;
        $settings->meta_title = $request->meta_title;
        $settings->meta_description = $request->meta_description;
        $settings->frontend_pricing_section = $request->frontend_pricing_section;
        $settings->frontend_custom_templates_section = $request->frontend_custom_templates_section;
        $settings->frontend_additional_url = $request->frontend_additional_url;
        $settings->frontend_custom_css = $request->frontend_custom_css;
        $settings->frontend_custom_js = $request->frontend_custom_js;
        $settings->frontend_footer_facebook = $request->frontend_footer_facebook;
        $settings->frontend_footer_twitter = $request->frontend_footer_twitter;
        $settings->frontend_footer_instagram = $request->frontend_footer_instagram;
        $settings->save();

        if ($request->hasFile('logo')){
            $path = 'upload/images/logo/';
            $image = $request->file('logo');
            $image_name = Str::random(4).'-'.Str::slug($settings->site_name).'-logo.'.$image->getClientOriginalExtension();

            //Resim uzantı kontrolü
            $imageTypes = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
            if (!in_array(Str::lower($image->getClientOriginalExtension()), $imageTypes)){
                $data = array(
                    'errors' => ['The file extension must be jpg, jpeg, png, webp or svg.'],
                );
                return response()->json($data, 419);
            }

            $image->move($path, $image_name);

            $settings->logo_path = $path.$image_name;
            $settings->logo = $image_name;
            $settings->save();
        }

        if ($request->hasFile('favicon')){
            $path = 'upload/images/favicon/';
            $image = $request->file('favicon');
            $image_name = Str::random(4).'-'.Str::slug($settings->site_name).'-favicon.'.$image->getClientOriginalExtension();

            //Resim uzantı kontrolü
            $imageTypes = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
            if (!in_array(Str::lower($image->getClientOriginalExtension()), $imageTypes)){
                $data = array(
                    'errors' => ['The file extension must be jpg, jpeg, png, webp or svg.'],
                );
                return response()->json($data, 419);
            }

            $image->move($path, $image_name);

            $settings->favicon_path = $path.$image_name;
            $settings->favicon = $image_name;
            $settings->save();
        }

    }

}
