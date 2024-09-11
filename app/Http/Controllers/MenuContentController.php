<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Music;
use Illuminate\Http\Request;

class MenuContentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($name)
    {
        $name = htmlspecialchars(html_entity_decode($name));
        $name = str_replace('-', ' ', $name);
        $menu = Menu::where('name', $name)->first();
        if ($menu == null) {
            abort(404);
        }
        $musics = Music::where('menu_id', $menu->id)->get();
        
        return view('app.menu')->with(['menu'=>$menu, 'musics'=>$musics]);
    }
}
