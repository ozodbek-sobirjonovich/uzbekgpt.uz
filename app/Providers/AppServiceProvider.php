<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\UserOpenai;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            DB::connection()->getPdo();
            $db_set = 1;
        } catch (\Exception $e) {
            $db_set = 2;
        }

        if ($db_set == 1) {
            if (Schema::hasTable('migrations')){
                View::share('setting', Setting::first());
                view()->composer('*', function ($view) {
                    if (Auth::check()) {
                        $total_documents_finder = UserOpenai::where('user_id', Auth::id())->get();
                        $total_words = UserOpenai::where('user_id', Auth::id())->sum('credits');
                        $total_documents = count($total_documents_finder);
                        $total_text_documents = count($total_documents_finder->where('credits', '!=', 1));
                        $total_image_documents = count($total_documents_finder->where('credits', '==', 1));
                        View::share('total_words', $total_words);
                        View::share('total_documents', $total_documents);
                        View::share('total_text_documents', $total_text_documents);
                        View::share('total_image_documents', $total_image_documents);
                    }
                });
            }

        }
    }
}
