<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('app.admin.menu.index')->with(['menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'unique:menus']
        ]);
        $name = $request->name;
        Menu::create([
            'name'=>$name
        ]);
        return redirect('admin/menus')->with('success', 'منو با موفقیت ساخته شد!');
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
        $menu = Menu::findOrFail($id);
        return view('app.admin.menu.edit')->with('menu', $menu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required', 'unique:menus']
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->save();
        return redirect('admin/menus')->with('success', 'منو با موفقیت تغییر یافت');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        Menu::destroy($id);
        return redirect('admin/menus')->with('success', 'منو با موفقعیت حذف شد!');
    }
}
