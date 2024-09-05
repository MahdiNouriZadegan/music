<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

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
            'password' => $password,
            'avatar'=>'null'
        ]);

        auth()->login($user);

        return redirect('/');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function login_store() {}
}
