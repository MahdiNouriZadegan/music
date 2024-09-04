@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header">
    اطلاعات کاربری
</div>
<div class="user-info">
    <div class="row">
        <div class="col-6">
            <label for="name">نام کاربری:</label>
            <input type="text" value="مهدی نوری" disabled name="name" id="name" class="form-control mt-2" />

        </div>
        <div class="col-6">
            <label for="name">ایمیل:</label>
            <input type="email" value="mahdi@gmail.com" name="name" disabled id="name" class="form-control mt-2" />
        </div>
        <div class="col-12 mt-3">
            <a class="btn btn-danger">خروج <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    @parent
@endsection
