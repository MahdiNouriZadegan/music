<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('app.admin.comment.index')->with(['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::findOrFail($id)->delete();
        return redirect('admin/comments')->with('success', 'نظر با موفقیت حذف گردید!');
    }

    public function change_status($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->status == 'hidden') {
            $comment->status = 'show';
            $comment->save();
            return redirect('admin/comments')->with('success', 'وضعیت نمایش نظر تغییر یافت!');
        } else {
            $comment->status = 'hidden';
            $comment->save();
            return redirect('admin/comments')->with('success', 'وضعیت نمایش نظر تغییر یافت!');
        }
    }
}
