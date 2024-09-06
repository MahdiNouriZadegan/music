@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')

<div class="panel-header">
    فرم ویرایش تگ موزیک
</div>
<div class="user-info">
    <form action="{{ url('admin/tags/'.$tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <label for="name">نام:</label>
                <input type="text" value="{{ $tag->name }}" name="name" id="name" class="form-control mt-2" />
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
