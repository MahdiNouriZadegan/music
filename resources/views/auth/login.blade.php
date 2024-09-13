@extends('app.layouts.template')

@section('title')
    موسیقی کده
@endsection

@section('styles')
    @parent
    @vite('resources/css/auth.css')
@endsection

@section('content')

<div class="container ">
    <img src="{{ url('images/bg-auth.png') }}" class="bg-auth" alt="">
    <div class="auth">
        <div class="header-auth">
            <h4 class="text-dark">فرم ثبت نام</h4>
        </div>
        <form action="{{ route('login_store') }}" method="post" id="login-form">
            @csrf
            <div class="auth-box">
                <span>ایمیل</span>
                <input type="email" required name="email" class="text-secondary form-control" />
            </div>
            <div class="auth-box">
                <span>رمز عبور</span>
                <input type="password"required id="password" name="password" class="text-secondary form-control" />
                <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            <button type="submit" class="btn btn-success mt-2">ورود</button>
        </form>
        @include('app.layouts.partials.errors')
        @include('app.layouts.partials.error_message')
    </div>
</div>

@endsection

@section('scripts')
    @parent
    @vite('resources/js/auth.js');
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
    </script>
@endsection