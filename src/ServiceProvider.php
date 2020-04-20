<?php

namespace Zashiki\ContactForm;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('contact.php'),
            __DIR__.'/views' => resource_path('views/vendor/contact'),
            __DIR__.'/contact.js' => resource_path('js/contact.js'),
        ]);

        $this->loadViewsFrom(__DIR__.'/views', 'contact');
    }
}
