<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Reaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'reaction'=>'required|min:1|max:5'
        ]);
        $reaction = $request->reaction;
        $music = Music::findOrFail($id);
        $ip = $request->ip();
        $hasReaction = Reaction::where(['ip'=>$ip, 'music_id'=>$id])->first();
        if ($hasReaction == null) {
            Reaction::insert([
                'ip'=>$ip,
                'reaction'=>$reaction,
                'music_id'=>$id
            ]);
            return redirect(set_url('detail', $music->title))->with('reaction_status', 'با موفقیت ثبت شد!');
        }
        return redirect(set_url('detail', $music->title))->with('reaction_status', 'شما قبلا نظر داده اید!');

    }
}
