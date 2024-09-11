<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Menu;
use App\Models\Music;
use App\Models\Singer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MusicRequest;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musics = Music::all();
        return view('app.admin.post.index')->with('musics', $musics);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        $tags = Tag::all();
        $singers = Singer::all();
        return view('app.admin.post.create')->with(['menus' => $menus, 'tags' => $tags, 'singers' => $singers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MusicRequest $request)
    {
        
        // save cover
        $coverName =  Carbon::now()->getTimestamp() . '.' . $request->cover->extension();
        $request->cover->move(public_path('musics-images'), $coverName);
        // save music
        $musicName =  Carbon::now()->getTimestamp() . '.' . $request->music->extension();
        $request->music->move(public_path('musics-audios'), $musicName);
        // change music's name and cover's name for insert to database
        $musicName = 'musics-audios/' . $musicName;
        $coverName = 'musics-images/' . $coverName;
        // check reaction and comment are actives or not
        if ($request->reactionable == null) {
            $reactionable = 'inactive';
        } else {
            $reactionable = 'active';
        }
        if ($request->commentable == null) {
            $commentable = 'inactive';
        } else {
            $commentable = 'active';
        }
        // insert data to musics table
        $music = Music::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'singer_id' => $request->singer_id,
            'menu_id' => $request->menu_id,
            'commentable' => $commentable,
            'reactionable' => $reactionable,
            'status' => $request->status,
            'view' => '0',
            'cover' => $coverName,
            'music_url' => $musicName,
            'user_id' => auth()->user()->id
        ]);
        $music->tags()->attach($request->tags);
        return redirect('admin/musics')->with('success', 'موزیک با موفقیت اضافه شد!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $menus = Menu::all();
        $singers = Singer::all();
        $music = Music::findOrFail($id);
        $notInTags = Tag::whereNotIn('id', $music->tags()->pluck('tag_id')->toArray())->get();
        $inTags = Tag::whereIn('id', $music->tags()->pluck('tag_id')->toArray())->get();
        return view('app.admin.post.show')->with(['menus' => $menus, 'notInTags' => $notInTags, 'inTags' => $inTags, 'singers' => $singers, 'music' => $music]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menus = Menu::all();
        $singers = Singer::all();
        $music = Music::findOrFail($id);
        $notInTags = Tag::whereNotIn('id', $music->tags()->pluck('tag_id')->toArray())->get();
        $inTags = Tag::whereIn('id', $music->tags()->pluck('tag_id')->toArray())->get();
        return view('app.admin.post.edit')->with(['menus' => $menus, 'notInTags' => $notInTags, 'inTags' => $inTags, 'singers' => $singers, 'music' => $music]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $music = Music::findOrFail($id);

        if ($request->cover != null) {
            if (File::exists(public_path($music->cover))) {
                File::delete(public_path($music->cover));
            }
            // save cover
            $coverName =  Carbon::now()->getTimestamp() . '.' . $request->cover->extension();
            $request->cover->move(public_path('musics-images'), $coverName);
            $coverName = 'musics-images/' . $coverName;
        } else {
            $coverName = $music->cover;
        }
        if ($request->music_file != null) {
            if (File::exists(public_path($music->music_url))) {
                File::delete(public_path($music->music_url));
            }
            // save music
            $musicName =  Carbon::now()->getTimestamp() . '.' . $request->music_file->extension();
            $request->music_file->move(public_path('musics-audios'), $musicName);
            $musicName = 'musics-audios/' . $musicName;
        } else {
            $musicName = $music->music_url;
        }
        // change music's name and cover's name for insert to database
        // check reaction and comment are actives or not
        if ($request->reactionable == null) {
            $reactionable = 'inactive';
        } else {
            $reactionable = 'active';
        }
        if ($request->commentable == null) {
            $commentable = 'inactive';
        } else {
            $commentable = 'active';
        }

        // insert data to musics table
        $music->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'singer_id' => $request->singer_id,
            'menu_id' => $request->menu_id,
            'commentable' => $commentable,
            'reactionable' => $reactionable,
            'status' => $request->status,
            'cover' => $coverName,
            'music_url' => $musicName
        ]);
        $music->tags()->attach($request->tags);
        
        return redirect('admin/musics')->with('success', 'موزیک با تغییر یافت!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $music = Music::findOrFail($id);

        // delete files from public folder
        if (File::exists(public_path($music->cover))) {
            File::delete(public_path($music->cover));
        }
        if (File::exists(public_path($music->music_url))) {
            File::delete(public_path($music->music_url));
        }
        Music::destroy($id);
        return redirect('admin/musics')->with('success', 'صفحه آهنگ با موفقیت حذف کردید!');
    }
    public function change_status(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $id = $request->id;
        $music = Music::findOrFail($id);
        if ($music->status == 'hidden') {
            $music->status = 'show';
            $music->save();
            return redirect('admin/musics')->with('success', 'وضعیت نمایش صفحه مورد نظر تغییر یافت!');
        } else {
            $music->status = 'hidden';
            $music->save();
            return redirect('admin/musics')->with('success', 'وضعیت نمایش صفحه مورد نظر تغییر یافت!');
        }
    }
}
