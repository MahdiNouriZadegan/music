<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function register_store(RegisterRequest $request)
    {
        if (auth()->check()) {
            abort(403);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'avatar'=>'null'
        ]);

        auth()->login($user);

        return redirect('/');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function login_store(Request $request) {
        $request->validate([
            'password'=>['required'],
            'email'=>['required']
        ]);

        $password = $request->password;
        $email = $request->email;

        $user = User::where('email', $email)->first();
        if ($user == null) {
            return redirect()->route('login')->with('error_message', 'کاربری با این مشخصات یافت نشد!');
        } else {
            if (password_verify($password, $user->password)){
                auth()->login($user);
                return redirect('/');
            } else {
                return redirect()->route('login')->with('error_message', 'کاربری با این مشخصات یافت نشد!');
            }
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
