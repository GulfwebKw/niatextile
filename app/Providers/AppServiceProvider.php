<?php

namespace App\Providers;

use App\Settings\DetailSettings;
use App\Settings\DetailsSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try{
            View::share('setting', app(DetailsSetting::class));
        } catch (\Exception $e) {}
    }
}
