<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class MailConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // get email view data in provider class


        $configuration = EmailConfiguration::find(1);

        if ($configuration) {
            $config = array(

                    'driver' => $configuration->driver,
                    'host' => $configuration->host,
                    'port' => $configuration->port,
                    'username' => $configuration->user_name,
                    'password' => $configuration->password,
                    'encryption' => $configuration->encryption,
                    'from' => array('address' => $configuration->sender_email, 'name' => $configuration->sender_name),
                    'pretend'    => false,
            );
            Config::set('mail', $config);
        }
    }
}