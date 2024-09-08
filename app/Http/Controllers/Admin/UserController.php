<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('app.admin.user.index')->with('users', $users);
    }

    public function permission($id)
    {
        $music = User::findOrFail($id);
        if ($music->permission == 'admin') {
            $music->permission = 'user';
            $music->save();
        } else {
            $music->permission = 'admin';
            $music->save();
        }
        return redirect('admin/users')->with('success', 'سطح دسترسی کاربر تغییر یافت!');
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin/users')->with('success', 'کاربر با موفقیت حذف گردید!');
    }
}
