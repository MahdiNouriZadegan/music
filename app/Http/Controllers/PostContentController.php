<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Music;
use App\Models\View;
use Illuminate\Http\Request;

class PostContentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($post)
    {

        // appear post
        $post = str_replace('-', ' ', $post);
        $post = htmlspecialchars(html_entity_decode($post));

        $music = Music::where(['title'=>$post, 'status'=>'show'])->first();
        if ($music == null) {
            $music = Music::where(['id'=>$post, 'status'=>'show'])->first();
            if ($music == null) {
                abort(404);
            }
        }
        // set view
        $ip = request()->ip();
        $view = View::where(['ip' => $ip, 'music_id' => $music->id])->first();
        if ($view == null) {
            View::create([
                'music_id' => $music->id,
                'ip'=>$ip
            ]);
        }


        $shortLink = 'localhost:8000/detail/' . $music->id;
        if (auth()->check()) {
            $favorite = Favorite::where(['user_id' => auth()->user()->id, 'music_id' => $music->id])->first();
        } else {
            $favorite = null;
        }
        return view('app.player')->with(['music' => $music, 'short_link' => $shortLink, 'favorite' => $favorite]);
    }
}
