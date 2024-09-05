@extends('app.layouts.template')
@section('title')
    فرم ثبت نام
@endsection
@section('styles')
    @parent
    @vite('resources/css/auth.css')
@endsection
@section('content')
    <div class="container">
        <img src="{{ url('images/bg-auth.png') }}" class="bg-auth" alt="">
        <div class="auth">
            <div class="header-auth">
                <h4 class="text-dark">فرم ثبت نام</h4>
            </div>
            <form action="register.html" method="get" id="auth-form">
                <div class="auth-box">
                    <span>نام کاربری</span>
                    <input type="text" name="name" id="name" class="text-secondary form-control" />
                </div>
                <div class="auth-box">
                    <span>ایمیل</span>
                    <input type="email" name="email" class="text-secondary form-control" />

                </div>
                <div class="auth-box">
                    <span>رمز عبور</span>
                    <input type="password" id="password" name="password" class="text-secondary form-control" />
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <div class="auth-box">
                    <span>تکرار رمز عبور</span>
                    <input type="password" name="confirm_password" class="text-secondary form-control" />
                </div>
                <button class="btn btn-success mt-2">ثبت نام</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    @vite('resources/js/auth.js');
@endsection
