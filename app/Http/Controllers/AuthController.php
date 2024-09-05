<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }
    public function register_store() {

    }
    public function login() {
        return view('auth.login');
    }
    public function login_store() {

    }
    
    
}
