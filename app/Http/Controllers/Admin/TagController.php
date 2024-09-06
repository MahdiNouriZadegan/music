<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('app.admin.tag.index')->with(['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'unique:tags']
        ]);
        $name = $request->name;
        Tag::create([
            'name'=>$name
        ]);
        return redirect('admin/tags')->with('success', 'تگ با موفقیت ساخته شد!');
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
        $tag = Tag::findOrFail($id);
        return view('app.admin.tag.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required', 'unique:tags']
        ]);

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect('admin/tags')->with('success', 'تگ با موفقیت تغییر یافت');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        Tag::destroy($id);
        return redirect('admin/tags')->with('success', 'تگ با موفقعیت حذف شد!');
    }
}
