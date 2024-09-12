<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Music;
use Illuminate\Http\Request;

class FavortieController extends Controller
{

    public function index()
    {
        // the musics user added for his favorites
        $user_id = auth()->user()->id;
        $favorites = Favorite::where('user_id', $user_id)->with(['music', 'music.singer'])->get();

        return view('app.panel.favorite')->with(['favorites' => $favorites]);
    }

    // this function will add music to user's favorite list
    public function store($id)
    {
        $id = htmlentities($id);
        $music = Music::findOrFail($id);
        $user_id = auth()->user()->id;
        $favorite = Favorite::where(['user_id' => $user_id, 'music_id' => $music->id])->first();
        if ($favorite == null) {
            Favorite::create([
                'music_id' => $music->id,
                'user_id' => $user_id
            ]);
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $id = htmlentities($id);
        $music = Music::findOrFail($id);
        $user_id = auth()->user()->id;
        $favorite = Favorite::where(['user_id' => $user_id, 'music_id' => $music->id])->first();
        if ($favorite != null) {
            $favorite->delete();
        }
        return redirect()->back();
    }
    // destroy all favorite musics in the user panel
    public function destroy_all() {
        $user_id = auth()->user()->id;
        Favorite::where('user_id', $user_id)->delete();
        return redirect()->back();
    }
}
