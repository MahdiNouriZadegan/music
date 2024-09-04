@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header">
    فرم ساخت خواننده
</div>
<div class="user-info">
    <form action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <label for="name">نام:</label>
                <input type="text" name="name" id="name" class="form-control mt-2" />
            </div>
            <div class="col-6">
                <label for="image">تصویر:</label>
                <input type="file" accept=".png,.jpeg,.jpg" name="image" id="image" class="form-control mt-2" />
            </div>
            <div class="col-12 mt-2">
                <label for="description">توضیحات:</label>
                <textarea name="description" id="description" rows="3" class="form-control mt-2"></textarea>
            </div>

            <div class="col-12 mt-3">
                <button class="btn btn-success">ایجاد</button>
            </div>
        </div>
    </form>

</div>
@endsection

@section('scripts')
@parent
@endsection
