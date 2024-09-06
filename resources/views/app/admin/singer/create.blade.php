@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header">
    فرم اضافه کردن خواننده
</div>
<div class="user-info">
    <form action="{{ url('admin/singers') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="name">نام:</label>
                <input type="text" name="name" id="name" required class="form-control mt-2" />
            </div>
            <div class="col-6">
                <label for="image">تصویر:</label>
                <input type="file" accept=".png,.jpeg,.jpg" required name="image" id="image" class="form-control mt-2" />
            </div>

            <div class="col-12 mt-3">
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
