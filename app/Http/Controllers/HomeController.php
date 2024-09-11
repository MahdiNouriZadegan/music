<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Singer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    
        $newMusics = Music::orderBy('updated_at')->limit(5)->get();
        return view('app.index')->with(['new_musics'=>$newMusics]);
    }
}
