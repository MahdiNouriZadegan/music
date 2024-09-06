@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        فرم ویرایش خواننده
    </div>
    <div class="user-info">
        <form action="{{ url('admin/singers/'.$singer->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label for="name">نام:</label>
                    <input type="text" value="{{ $singer->name }}" required name="name" id="name"
                        class="form-control mt-2" />
                </div>
                <div class="col-6">
                    <label for="image">تصویر:</label>
                    <input type="file" value="{{ old('image') }}" accept=".png,.jpeg,.jpg" name="image" id="image"
                        class="form-control mt-2" />
                </div>
                <div class="col-2">
                    <p class="my-2">عکس:</p>
                    <img width="100px" src="{{ asset($singer->image) }}" alt="">
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-success">ویرایش</button>
                </div>
            </div>
        </form>
        @include('app.layouts.partials.errors')
    </div>
@endsection

@section('scripts')
    @parent
@endsection
