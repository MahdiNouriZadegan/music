<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;

class CommentController extends Controller
{
    public function store(Request $request, $id) {
        $music = Music::findOrFail(htmlspecialchars($id));
        $request->validate([
            // 'comment'=>['required','min:3', 'max:800', 'regex:/^[ا-ی A-z]*$/'],
            'comment' => ['required','min:3', 'max:800','regex:/^[آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی A-Za-z0-9.\n\s\t!?،؟!|():\-_*+×÷=&%$#@,]*$/'],
            // 'comment'=>['required','min:3', 'max:800', 'regex:/^[A-z0-9.آ-ی \n\s\t!?،؟!|():-_*+×÷=&%$#@,]*$/'],
        ]);
        Comment::create([
            'comment' => $request->comment,
            'music_id' => $music->id,
            'user_id'=> auth()->user()->id
        ]);

        return redirect(set_url('detail', $music->title))->with('success', 'نظر شما ثبت شد و بعد از بررسی منتشر می شود!');
    }
    public function store_feedback(Request $request, $id) {
        $ip = $request->ip();
        $request->validate(['feedback'=>'required']);
        $id = htmlspecialchars(htmlentities($id));
        $comment = Comment::findOrFail($id);
        $feedback = Feedback::where(column: ['ip'=>$ip, 'comment_id'=>$id])->first();
        if ($feedback == null) {
            if ($request->feedback == 2 || $request->feedback == 1) {
                Feedback::create([
                    'ip'=>$ip,
                    'comment_id'=>$comment->id,
                    'feedback'=> $request->feedback
                ]);
                return redirect()->back();
            } 
        }
        return redirect()->back()->with('success', 'شما قبلا به این نظر واکنش داده اید!');
    }
}
