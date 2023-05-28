<?php

namespace App\Http\Controllers;

use App\Models\OpenAIGenerator;
use App\Models\PaymentPlans;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index(){


        $templates = OpenAIGenerator::all();
        $plans = PaymentPlans::where('type', 'subscription')->get();

        $setting = Setting::first();
        if ($setting->frontend_additional_url != null){
            return Redirect::to($setting->frontend_additional_url);
        }

        return view('index', compact('templates', 'plans'));
    }
}
