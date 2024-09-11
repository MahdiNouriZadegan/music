<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    /*
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $id = htmlspecialchars(html_entity_decode($id));
        $singer = Singer::findOrFail($id);
        $musics = Music::where('singer_id', $singer->id)->get();
        return view('app.singer')->with(['singer'=>$singer, 'musics'=>$musics]);
    }
}
