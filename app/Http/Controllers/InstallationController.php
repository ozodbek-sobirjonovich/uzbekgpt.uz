<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InstallationController extends Controller
{

    public function envFileEditor(){
        return view('vendor.installer.env_file_editor');
    }
    public function envFileEditorSave(Request $request){

        $envFileData =
            'APP_NAME=\''.'MagicAI'."'\n".
            'APP_ENV='.$request->environment."\n".
            'APP_KEY='.'base64:'.base64_encode(Str::random(32))."\n".
            'APP_DEBUG='.$request->app_debug."\n".
            'APP_URL='.$request->app_url."\n\n".
            'DB_CONNECTION='.'mysql'."\n".
            'DB_HOST='.$request->database_hostname."\n".
            'DB_PORT='.'3306'."\n".
            'DB_DATABASE='.$request->database_name."\n".
            'DB_USERNAME='.$request->database_username."\n".
            'DB_PASSWORD='.$request->database_password."\n\n".
            'BROADCAST_DRIVER='.'log'."\n".
            'CACHE_DRIVER='.'file'."\n".
            'SESSION_DRIVER='.'file'."\n".
            'QUEUE_DRIVER='.'sync'."\n\n".
            'REDIS_HOST='.'127.0.0.1'."\n".
            'REDIS_PASSWORD='.'null'."\n".
            'REDIS_PORT='.'6379'."\n\n".
            'MAIL_DRIVER='.'smtp'."\n".
            'MAIL_HOST='.'mailpit'."\n".
            'MAIL_PORT='.'1025'."\n".
            'MAIL_USERNAME='.'null'."\n".
            'MAIL_PASSWORD='.'null'."\n".
            'MAIL_ENCRYPTION='.'null'."\n\n".
            'PUSHER_APP_ID='.'null'."\n".
            'PUSHER_APP_KEY='.'null'."\n".
            'PUSHER_APP_SECRET='.'null';

        try {
            $envPath = base_path('.env');
            file_put_contents($envPath, $envFileData);
            $request->flash();
            return redirect()->route('installer.install');
        } catch (\Exception $e) {
            echo 'Cannot update .env file. Please update file manually in order to run this script. Need help? <br> <a href="https://liquidthemes.freshdesk.com/support/tickets/new">Submit a Ticket</a>';
        }
    }


    public function install(Request $request){

        try {
            $dbconnect = DB::connection()->getPDO();
            $dbname = DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            return redirect()->route('installer.envEditor');
        }

        if (!Schema::hasTable('migrations')){
            Artisan::call('migrate', [
                '--force' => true
            ]);
            Artisan::call('db:seed', [
                '--force' => true
            ]);
        }else{
            return  redirect()->route('index');
        }

        //First Startup of Script
        $settings = Setting::first();
        if ($settings == null){
            $settings = new Setting();
            $settings->save();
        }

        $adminUser = User::where('type', 'admin')->first();
        if ($adminUser == null){
            $adminUser = new User();
            $adminUser->name = 'Admin';
            $adminUser->surname = 'Admin';
            $adminUser->email = 'admin@admin.com';
            $adminUser->phone = '5555555555';
            $adminUser->type = 'admin';
            $adminUser->password = '$2y$10$XptdAOeFTxl7Yx2KmyfEluWY9Im6wpMIHoJ9V5yB96DgQgTafzzs6';
            $adminUser->status = 1;
            $adminUser->remaining_words = 100000;
            $adminUser->remaining_images = 100000;
            $adminUser->affiliate_code = 'P60NPGHAAFGD';
            $adminUser->save();
        }

        Auth::login($adminUser);
        return redirect()->route('dashboard.admin.settings.general');
    }

    public function upgrade(){
        $version = 0.9;

        $currentVersion = Setting::first()->script_version;

        if ($version > $currentVersion){
            if (!Schema::hasTable('migrations')){
                return 'MagicAI is not installed. Install it first.';
            }
            Artisan::call('migrate');
            $settings = Setting::first();
            $settings->script_version = $version;
            return "<p>magicAI Updated to the version: $version. <br>You need to update the assets. Please run; npm install and npm run build. Go to <a target='_blank' href=''>documentation</a></p>";
        }else{
            return 'Your system is at final version.';
        }
    }
}
