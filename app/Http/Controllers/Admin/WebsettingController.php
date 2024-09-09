<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Websetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebsettingRequest;
use Illuminate\Support\Facades\File;
class WebsettingController extends Controller
{
    public function checkHasWebsetting()
    {
        $websetting = Websetting::all();
        if ($websetting->isEmpty()) {
            return false;
        }
        return true;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websetting = Websetting::first();

        return view('app.admin.setting.index')->with('websetting', $websetting);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->checkHasWebsetting() == true)
            return redirect('admin/websetting/1/edit');

        return view('app.admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WebsettingRequest $request)
    {
        if ($this->checkHasWebsetting() == true)
            return redirect('admin/websetting/1/edit');

        // save the logo uploaded
        $logoName =  'logo' . '.' . $request->logo->extension();
        $request->logo->move(public_path('images/'), $logoName);

        Websetting::create([
            'title' => $request->title,
            'description' => $request->description,
            'logo' => 'images/' . $logoName,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect('admin/websetting')->with('success', 'تنظیمات با موفقیت اضافه شد!');
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
        return redirect('admin/websetting');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($this->checkHasWebsetting() == false)
            return redirect('admin/websetting/create');

        $websetting = Websetting::first();
        if ($request->logo != null) {
            if (File::exists(public_path($websetting->logo))) {
                File::delete(public_path($websetting->logo));
            }
            $logoName = 'logo' . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/'), $logoName);
            $logoName = 'images/'  . $logoName;
        } else {
            $logoName = $websetting->logo;
        }

        // save the logo uploaded
        

        $websetting->update([
            'title' => $request->title,
            'description' => $request->description,
            'logo' => $logoName,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect('admin/websetting')->with('success', 'تنظیمات با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect('admin/websetting');
    }
}
