<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Helper;
use Illuminate\Support\Facades\View;

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
        $cachePostfix = Helper::getCachePostfix();
        View::share('cachePostfix', $cachePostfix);
    }
}
