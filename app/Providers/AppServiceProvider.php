<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Helper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('admin', function () {
            return auth()->user() && auth()->user()->isAdmin();
        });
        $cachePostfix = Helper::getCachePostfix();
        View::share('cachePostfix', $cachePostfix);
    }
}
