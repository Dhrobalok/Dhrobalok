<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Mailsetting;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $Mailsetting=Mailsetting::first();
        if($Mailsetting)
        {
            $data = [

                'driver' => $Mailsetting->mail_transport,
                'host' => $Mailsetting->mail_host,
                'port' => $Mailsetting->mail_port,
                'encryption' => $Mailsetting->mail_encrypt,
                'username' => $Mailsetting->mail_username,
                'password' => $Mailsetting->mail_pass,
                'from'     =>
                [
                    'address'=>$Mailsetting->mail_form,
                    'name'=>'rajIt'
                ]


            ];
            Config::set('mail', $data);
        }

        //
    }
}
