<?php

namespace avsr_sts\Contactus;

use Illuminate\Support\ServiceProvider;  

class ContactusServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views','contactus');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        
        $this->MergeConfigFrom(
            __DIR__ . '/config/conf_contactUs.php','conf_contact'
        );
        $this->publishes([
            __DIR__ . '/config/conf_contactUs.php' => config_path('conf_contact.php'),
            __DIR__ . '/views' => resource_path('views/vendor/contactus')
            ]);

    }

    public function register()
    {
        // Any binding or configuration can be done here
    }
}
