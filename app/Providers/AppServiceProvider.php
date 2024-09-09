<?php

namespace App\Providers;

use App\Models\Websetting;
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
        $websetting = Websetting::first();
        if ($websetting) {
            view()->share(['logo_url'=>$websetting->logo, 'site_name'=>$websetting->title]);
            
        } else {
            view()->share(['logo_url'=> '', 'site_name'=>'']);
        }
    }
}
