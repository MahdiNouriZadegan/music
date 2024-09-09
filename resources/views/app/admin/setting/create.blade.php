@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        فرم تنظیم تنظیمات سایت
    </div>
    <div class="user-info">
        <form action="{{ url('admin/websetting/') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="title">نام سایت:</label>
                    <input type="text" value="{{ old('title') }}" name="title" id="title" class="form-control mt-2" />
                </div>
                <div class="col-12 my-2">
                    <label for="description">توضیحات سایت:</label>
                    <textarea name="description" class="form-control" id="description" rows="2">{{ old('description') }}</textarea>
                </div>
                
                    <div class="col-6">
                        <label for="email">ایمیل:</label>
                        <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control mt-2" />
                    </div>
                    <div class="col-6">
                        <label for="phone">شماره تماس:</label>
                        <input type="text" value="{{ old('phone') }}" name="phone" id="phone" class="form-control mt-2" />
                    </div>
                <div class="col-6 mt-2">
                    <label for="logo">لوگو سایت:</label>
                    <input type="file" value="{{ old('logo') }}" name="logo" id="logo" class="form-control mt-2" />
                </div>

                <div class="col-6 mt-4">
                    <button class="btn btn-success">ایجاد</button>
                </div>
            </div>
        </form>
        @include('app.layouts.partials.errors')


    </div>
@endsection

@section('scripts')
    @parent
@endsection
