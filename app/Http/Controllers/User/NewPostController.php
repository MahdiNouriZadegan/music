<?php

namespace App\Http\Controllers\User;

use App\Models\Music;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewPostController extends Controller
{
    public function index() {
        $newMusics = Music::orderBy('updated_at')->where('status', 'show')->limit(5)->get();
        return view('app.panel.new')->with(['new_musics'=>$newMusics]);
    }
}
