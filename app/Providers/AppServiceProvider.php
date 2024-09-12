<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Music;
use App\Models\Singer;
use App\Models\Websetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
            view()->share(['logo_url'=>$websetting->logo, 'site_name'=>$websetting->title, 'websetting_provider'=>$websetting]);
        } else {
            view()->share(['logo_url'=> '', 'site_name'=>'', 'websetting_provider'=>'']);
        }
        $singers = Singer::all();
        $menus = Menu::all();
        $mostViewMusics = Music::orderBy('view')->limit('3')->get();
        view()->share(['list_singers' => $singers, 'list_menus'=>$menus, 'list_most_view_musics'=>$mostViewMusics]);

        Blade::if('admin', function(){
            if (auth()->check() && auth()->user()->permission == 'admin') {
                return true;
            }
            return false;
        });
        
    }
}
