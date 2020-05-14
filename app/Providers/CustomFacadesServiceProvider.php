<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class CustomFacadesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * @return \App'Http\Classes\DateManager
         */
        $this->app->bind("DateManager", function() {
            return new \App\Http\Classes\DateManager;
        });
        /**
         * @return \App\Http\Classes\OneC
         */
        \App::bind("oneC", function()
        {
            return new \App\Http\Classes\OneC;
        });
    }
}
