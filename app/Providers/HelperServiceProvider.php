<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $file = app_path('Helpers/jalali-helper.php');
        $set_url_helper = app_path('Helpers/set-url.php');
        if (file_exists($file) && file_exists($set_url_helper)) {
            require_once($file);
            require_once($set_url_helper);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
