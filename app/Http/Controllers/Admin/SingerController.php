<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Singer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $musics = Music::all();
        // $comments = Singer::with('musics.comments')->get();

        $singers = Singer::withCount(['musics as comments_count' => function ($query) {
            $query->join('comments', 'musics.id', '=', 'comments.music_id');
        }],
        
        ['musics as favorites_count' => function ($query) {
            $query->join('favorites', 'musics.id', '=', 'favorites.music_id');
        }]
        )->get();
        return view('app.admin.singer.index')->with(['singers' => $singers, 'musics' => $musics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.admin.singer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:singers',
            'image' => 'required|image|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $imageName =  Carbon::now()->getTimestamp() . '.' . $request->image->extension();
        $request->image->move(public_path('singers-images'), $imageName);

        Singer::create([
            'name' => $request->name,
            'image' => 'singers-images/' . $imageName
        ]);

        return redirect('admin/singers')->with('success', 'خواننده با موفقیت ایجاد شد!');
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
        $singer = Singer::findOrFail($id);
        return view('app.admin.singer.edit')->with('singer', $singer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'image' => 'image|max:2048|dimensions:min_width=100,min_height=100',
        ]);


        if ($request->image == '') {
            dd('s');
            $singer = Singer::findOrFail($id);
            $singer->name = $request->name;
            $singer->save();
        } else {
            $singer = Singer::findOrFail($id);
            if (File::exists(public_path($singer->image))) {
                File::delete(public_path($singer->image));
            }
            $imageName =  Carbon::now()->getTimestamp() . '.' . $request->image->extension();
            $request->image->move(public_path('singers-images'), $imageName);
            $singer->image = 'singers-images/' . $imageName;
            $singer->name = $request->name;
            $singer->save();
        }
        return redirect('admin/singers')->with('success', 'اطلاعات خواننده با موفقیت تغییر یافت');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $singer = Singer::findOrFail($id);
        if (File::exists(public_path($singer->image))) {
            File::delete(public_path($singer->image));
        }
        Singer::destroy($id);
        return redirect('admin/singers')->with('success', 'اطلاعات خواننده با موفقیت حذف شد!');
    }
}
