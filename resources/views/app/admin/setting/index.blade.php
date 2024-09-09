@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">تنظیمات وب سایت</p>
        @if (!$websetting)
            <a href="{{ url('admin/websetting/create') }}" class="link"><span>ساخت</span></a>
        @endif
    </div>
    <div class="user-new-music">
        @if (!$websetting)
            <p class="text-center pt-4">موردی یافت نشد!</p>
        @else
        <div class="user-info">
            <form action="{{ url('admin/websetting/'. $websetting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <label for="title">نام سایت:</label>
                        <input type="text" value="{{ $websetting->title }}" name="title" id="title" class="form-control mt-2" />
                    </div>
                    <div class="col-12 my-2">
                        <label for="description">توضیحات سایت:</label>
                        <textarea name="description" class="form-control mt-2" id="description" rows="2">{{ $websetting->description }}</textarea>
                    </div>
                    
                        <div class="col-6">
                            <label for="email">ایمیل:</label>
                            <input type="text" value="{{ $websetting->email }}" name="email" id="email" class="form-control mt-2" />
                        </div>
                        <div class="col-6">
                            <label for="phone">شماره تماس:</label>
                            <input type="text" value="{{ $websetting->phone }}" name="phone" id="phone" class="form-control mt-2" />
                        </div>
                    <div class="col-6 mt-2">
                        <label for="logo">لوگو سایت:</label>
                        <input type="file" value="{{ old('logo') }}" name="logo" id="logo" class="form-control mt-2" />
                    </div>

                    <div class="col-6 mt-2">
                        <img src="{{ asset($websetting->logo) }}" width="100" class="border rounded" alt="">
                    </div>
    
                    <div class="col-12 mt-4">
                        <button class="btn btn-success">ویرایش</button>
                    </div>
                </div>
            </form>
            @include('app.layouts.partials.errors')
    
    
        </div>
        @endif
    </div>
@endsection

@section('scripts')
    @parent
@endsection
