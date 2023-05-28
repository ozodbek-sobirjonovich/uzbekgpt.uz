<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function general(){
        return view('panel.admin.settings.general');
    }

    public function generalSave(Request $request){
        $settings = Setting::first();
        $settings->site_name = $request->site_name;
        $settings->site_url = $request->site_url;
        $settings->site_email = $request->site_email;
        $settings->default_country = $request->default_country;
        $settings->default_currency = $request->default_currency;
        $settings->register_active = $request->register_active;
        $settings->google_analytics_code = $request->google_analytics_code;
        $settings->meta_title = $request->meta_title;
        $settings->meta_description = $request->meta_description;
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

    public function openai(){
        return view('panel.admin.settings.openai');
    }

    public function openaiSave(Request $request){
        $settings = Setting::first();
        $settings->openai_api_secret = $request->openai_api_secret;
        $settings->openai_default_model = $request->openai_default_model;
        $settings->openai_default_language = $request->openai_default_language;
        $settings->openai_default_tone_of_voice = $request->openai_default_tone_of_voice;
        $settings->openai_default_creativity = $request->openai_default_creativity;
        $settings->openai_max_input_length = $request->openai_max_input_length;
        $settings->openai_max_output_length = $request->openai_max_output_length;
        $settings->save();
    }

    public function invoice(){
        return view('panel.admin.settings.invoice');
    }

    public function invoiceSave(Request $request){
        $settings = Setting::first();
        $settings->invoice_currency = $request->invoice_currency;
        $settings->invoice_name = $request->invoice_name;
        $settings->invoice_website = $request->invoice_website;
        $settings->invoice_address = $request->invoice_address;
        $settings->invoice_city = $request->invoice_city;
        $settings->invoice_state = $request->invoice_state;
        $settings->invoice_country = $request->invoice_country;
        $settings->invoice_phone = $request->invoice_phone;
        $settings->invoice_postal = $request->invoice_postal;
        $settings->invoice_vat = $request->invoice_vat;
        $settings->save();
    }

    public function payment(){
        return view('panel.admin.settings.stripe');
    }

    public function paymentSave(Request $request){
        $settings = Setting::first();
        $settings->default_currency = $request->default_currency;
        $settings->stripe_active = 1;
        $settings->stripe_key = $request->stripe_key;
        $settings->stripe_secret = $request->stripe_secret;
        $settings->stripe_base_url = $request->stripe_base_url;
        $settings->save();
    }

    public function affiliate(){
        return view('panel.admin.settings.affiliate');
    }

    public function affiliateSave(Request $request){
        $settings = Setting::first();
        $settings->affiliate_minimum_withdrawal = $request->affiliate_minimum_withdrawal;
        $settings->affiliate_commission_percentage = $request->affiliate_commission_percentage;
        $settings->save();
    }
}
