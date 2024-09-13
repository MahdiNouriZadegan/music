<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'q'=>['required', 'regex:/^[\x{0600}-\x{06FF}0-9.\s\t!?،؟!|():\-_,A-z]*$/u']
        ]);
        
        $search = $request->q;
        $musics = Music::where('title', 'like', "%$search%")->get();
        return view('app.search')->with(['musics' => $musics]);
    }
}
