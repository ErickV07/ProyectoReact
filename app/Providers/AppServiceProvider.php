<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Str;
use \Illuminate\Support\Facades\URL;
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
        if(config(key:'app.env') === 'production'){
            URL::forceScheme(scheme:'https');
        }

        if (env('APP_ENV') === 'production' || env('APP_ENV') === 'dev') {
            \URL::forceScheme('https');
       }
    }
}
