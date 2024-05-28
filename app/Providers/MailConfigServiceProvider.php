<?php

namespace App\Providers;

use App\Models\EmailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (Schema::hasTable('email_settings')) {
            $mail = EmailSetting::first();
            if (isset($mail->id)) //checking if table is not empty
            {
                $config = array(
                    'driver'     => $mail->mail_driver,
                    'host'       => $mail->mail_host,
                    'port'       => $mail->mail_port,
                    'from'       => array('address' => $mail->mail_from_address, 'name' => $mail->mail_from_name),
                    'encryption' => $mail->mail_encryption,
                    'username'   => $mail->mail_username,
                    'password'   => $mail->mail_password,
                );

                Config::set('mail', $config);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
