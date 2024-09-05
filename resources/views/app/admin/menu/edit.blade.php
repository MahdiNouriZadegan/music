@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header">
    فرم ویرایش منو
</div>
<div class="user-info">
    <form action="">
        <div class="row">
            <div class="col-12">
                <label for="name">عنوان:</label>
                <input type="text" name="name" id="name" class="form-control mt-2" />
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
