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
use App\Models\UserFavorite;
use App\Models\UserOpenai;
use App\Models\UserOpenaiChat;
use App\Models\UserOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Cashier\Payment;
use Stripe\PaymentIntent;
use Stripe\Plan;

class UserController extends Controller
{
    public function redirect(){
        if (Auth::user()->type == 'admin'){
            return redirect()->route('dashboard.admin.index');
        }else{
            return redirect()->route('dashboard.user.index');

        }
    }

    public function index(){
        $user = Auth::user();
        return view('panel.user.dashboard');
    }

    public function openAIList(){
        $list = OpenAIGenerator::all();
        $filters = OpenaiGeneratorFilter::get();
        return view('panel.user.openai.list', compact('list', 'filters'));
    }

    public function openAIFavoritesList(){
        return view('panel.user.openai.list_favorites');
    }

    public function openAIFavorite(Request $request){
        $exists =  isFavorited($request->id);
        if ($exists){
            $favorite = UserFavorite::where('openai_id', $request->id)->where('user_id', Auth::id())->first();
            $favorite->delete();
            $html = '<svg width="16" height="15" viewBox="0 0 16 15" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>';
        }else{
            $favorite = new UserFavorite();
            $favorite->user_id = Auth::id();
            $favorite->openai_id = $request->id;
            $favorite->save();
            $html = '<svg width="16" height="15" viewBox="0 0 16 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>';

        }
        return response()->json(compact('html'));
    }

    public function openAIGenerator($slug){
        $openai = OpenAIGenerator::whereSlug($slug)->firstOrFail();
        $userOpenai = UserOpenai::where('user_id', Auth::id())->where('openai_id', $openai->id)->orderBy('created_at', 'desc')->get();
        return view('panel.user.openai.generator', compact('openai', 'userOpenai'));
    }

    public function openAIGeneratorWorkbook($slug){
        $openai = OpenAIGenerator::whereSlug($slug)->firstOrFail();
        return view('panel.user.openai.generator_workbook', compact('openai' ));
    }

    public function openAIGeneratorWorkbookSave(Request $request){
        $workbook = UserOpenai::where('slug', $request->workbook_slug)->firstOrFail();
        $workbook->output = $request->workbook_text;
        $workbook->title = $request->workbook_title;
        $workbook->save();
        return response()->json([], 200);
    }

    //Chat
    public function openAIChat(){
        $chat = Auth::user()->openaiChat;
        return view('panel.user.openai.chat', compact('chat'));
    }

    //Profile user settings
    public function userSettings(){
        $user = Auth::user();
        return view('panel.user.settings.index', compact('user'));
    }

    public function userSettingsSave(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->country = $request->country;

        if ($request->hasFile('avatar')){
            $path = 'upload/images/avatar/';
            $image = $request->file('avatar');
            $image_name = Str::random(4).'-'.Str::slug($user->fullName()).'-avatar.'.$image->getClientOriginalExtension();

            //Resim uzantı kontrolü
            $imageTypes = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
            if (!in_array(Str::lower($image->getClientOriginalExtension()), $imageTypes)){
                $data = array(
                    'errors' => ['The file extension must be jpg, jpeg, png, webp or svg.'],
                );
                return response()->json($data, 419);
            }

            $image->move($path, $image_name);

            $user->avatar = $path.$image_name;
        }

        createActivity($user->id, 'Updated', 'Profile Information', null);
        $user->save();
    }

    //Purchase
    public function subscriptionPlans() {
        $plans = PaymentPlans::where('type', 'subscription')->where('active', 1)->get();
        $prepaidplans = PaymentPlans::where('type', 'prepaid')->where('active', 1)->get();
        return view('panel.user.payment.subscriptionPlans', compact('plans', 'prepaidplans'));


    }
    //Payment Subscription
    public function subscriptionPayment($id){

        $settings = Setting::first();
        // Setting stripe api from database
        config(['cashier.key' => $settings->stripe_key]);
        config(['cashier.secret' => $settings->stripe_secret]);
        config(['cashier.currency' => currency()->code]);

        $user = Auth::user();
        $activesub = $user->subscriptions()->where('stripe_status', 'active')->first();


        if (isset($activesub)) {
            if ($user->subscribed($activesub->name)) {
                return back()->with(['message' => 'You already have subscription.Please cancel it before creating a new subscription.', 'type' => 'error']);
            }
        }

        $intent = auth()->user()->createSetupIntent();
        $plan = PaymentPlans::where('id', $id)->first();
        return view('panel.user.payment.subscriptionPayment', compact('plan', 'intent'));
    }

    public function subscriptionPaymentPay(Request $request){
        $plan = PaymentPlans::find($request->plan);
        $user = Auth::user();
        $settings = Setting::first();
        // Setting stripe api from database
        config(['cashier.key' => $settings->stripe_key]);
        config(['cashier.secret' => $settings->stripe_secret]);
        config(['cashier.currency' => currency()->code]);

        if (!$user->hasDefaultPaymentMethod()) {
            $user->updateDefaultPaymentMethodFromStripe();
        }

        $subscription = $request->user()->newSubscription($plan->id, $plan->stripe_product_id)
            ->create($request->token);

        $subscription->plan_id = $plan->id;
        $subscription->save();

        $payment = new UserOrder();
        $payment->order_id = Str::random(12);
        $payment->plan_id = $plan->id;
        $payment->user_id = $user->id;
        $payment->payment_type = 'Credit, Debit Card';
        $payment->price = $plan->price;
        $payment->affiliate_earnings = ($plan->price*$settings->affiliate_commission_percentage)/100;
        $payment->status = 'Success';
        $payment->country = Auth::user()->country == 'Unknown';
        $payment->save();

        $user->remaining_words += $plan->total_words;
        $user->remaining_images += $plan->total_images;
        $user->save();

        createActivity($user->id, 'Purchased', $plan->name.' Plan', null);

        return redirect()->route('dashboard.index')->with(['message' => 'Thank you for your purchase. Enjoy your remaining words and images.', 'type' => 'success']);
    }

    //Subscription Cancel
    public function subscriptionCancel(){

        $user = Auth::user();
        // Setting stripe api from database
        $settings = Setting::first();
        config(['cashier.key' => $settings->stripe_key]);
        config(['cashier.secret' => $settings->stripe_secret]);
        config(['cashier.currency' => currency()->code]);

        $activesub = $user->subscriptions()->where('stripe_status', 'active')->first();
        $user->subscription($activesub->name)->cancelNow();


        $user->remaining_words = 0;
        $user->remaining_images = 0;
        $user->save();

        createActivity($user->id, 'Cancelled', 'Subscription plan', null);


        return back()->with(['message' => 'Your subscription is cancelled succesfully.', 'type' => 'success']);

    }

    //Payment Subscription
    public function prepaidPayment($id){
        $user = Auth::user();
        $activesubs = $user->subscriptions()->where('stripe_status', 'active')->get();

        $settings = Setting::first();
        // Setting stripe api from database
        config(['cashier.key' => $settings->stripe_key]);
        config(['cashier.secret' => $settings->stripe_secret]);
        config(['cashier.currency' => currency()->code]);

        $intent = auth()->user()->createSetupIntent();
        $plan = PaymentPlans::where('id', $id)->first();
        return view('panel.user.payment.prepaidPayment', compact('plan', 'intent', 'activesubs'));
    }


    public function prepaidPaymentPay(Request $request){
        $plan = PaymentPlans::find($request->plan);
        $user = Auth::user();
        $paymentMethod = $request->payment_method;

        $settings = Setting::first();
        // Setting stripe api from database
        config(['cashier.key' => $settings->stripe_key]);
        config(['cashier.secret' => $settings->stripe_secret]);
        config(['cashier.currency' => currency()->code]);
        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($plan->price * 100, $paymentMethod);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        $payment = new UserOrder();
        $payment->order_id = Str::random(12);
        $payment->plan_id = $plan->id;
        $payment->type = 'prepaid';
        $payment->user_id = $user->id;
        $payment->payment_type = 'Credit, Debit Card';
        $payment->price = $plan->price;
        $payment->affiliate_earnings = ($plan->price*$settings->affiliate_commission_percentage)/100;
        $payment->status = 'Success';
        $payment->country = Auth::user()->country == 'Unknown';
        $payment->save();

        $user->remaining_words += $plan->total_words;
        $user->remaining_images += $plan->total_images;
        $user->save();

        createActivity($user->id, 'Purchased', $plan->name.' Prepaid Plan', null);

        return redirect()->route('dashboard.index')->with(['message' => 'Thank you for your purchase. Enjoy your remaining words and images.', 'type' => 'success']);
    }

    //Invoice - Billing
    public function invoiceList(){
        $user = Auth::user();
        $list = $user->orders;
        return view('panel.user.orders.index', compact('list'));
    }

    public function invoiceSingle($order_id){
        $user = Auth::user();
        $invoice = UserOrder::where('order_id', $order_id)->firstOrFail();
        return view('panel.user.orders.invoice', compact('invoice'));
    }

    public function documentsAll(){
        $items = Auth::user()->openai()->orderBy('created_at', 'desc')->get();
        return view('panel.user.openai.documents', compact('items'));
    }

    public function documentsSingle($slug){
        $workbook = UserOpenai::where('slug', $slug)->first();
        $openai = $workbook->generator;
        return view('panel.user.openai.documents_workbook', compact('workbook', 'openai'));
    }

    public function documentsDelete($slug){
        $workbook = UserOpenai::where('slug', $slug)->first();
        $workbook->delete();
        return redirect()->route('dashboard.user.openai.documents.all')->with(['message' => 'Document deleted succesfuly', 'type' => 'success']);

    }

    //Affiliates
    public function affiliatesList(){
        $user = Auth::user();
        $list = $user->affiliates;
        $list2 = $user->withdrawals;
        $totalEarnings = 0;
        foreach ($list as $affOrders){
            $totalEarnings += $affOrders->orders->sum('affiliate_earnings');
        }
        $totalWithdrawal = 0;
        foreach($list2 as $affWithdrawal){
            $totalWithdrawal += $affWithdrawal->amount;
        }
        return view('panel.user.affiliate.index', compact('list', 'list2', 'totalEarnings', 'totalWithdrawal'));
    }

    public function affiliatesListSendRequest(Request $request){
        $user = Auth::user();
        $list = $user->affiliates;
        $list2 = $user->withdrawals;

        $totalEarnings = 0;
        foreach ($list as $affOrders){
            $totalEarnings += $affOrders->orders->sum('affiliate_earnings');
        }
        $totalWithdrawal = 0;
        foreach($list2 as $affWithdrawal){
            $totalWithdrawal += $affWithdrawal->amount;
        }
        if ($totalEarnings - $totalWithdrawal >= $request->amount){
            $user->affiliate_bank_account = $request->affiliate_bank_account;
            $user->save();
            $withdrawalReq = new UserAffiliate();
            $withdrawalReq->user_id = Auth::id();
            $withdrawalReq->amount = $request->amount;
            $withdrawalReq->save();

            createActivity($user->id, 'Sent', 'Affiliate Withdraw Request', route('dashboard.admin.affiliates.index'));

        }else{
            return response()->json(['error' => 'ERROR'], 411);
        }
    }


}
