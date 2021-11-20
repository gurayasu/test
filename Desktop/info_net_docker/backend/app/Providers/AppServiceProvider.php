<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Schemaクラスをuseする
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;    //この行を追加

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
        //
        URL::forceScheme('https');
    }

    // public function boot()
    // {
    //     //
    //     Schema::defaultStringLength(191);
    //     if (\App::environment(['staging', 'production'])) {
    //         \URL::forceScheme('https');
    //     }
    // }
}
