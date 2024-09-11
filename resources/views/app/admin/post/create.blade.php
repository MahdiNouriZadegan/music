@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        فرم ساخت صفحه موزیک
    </div>
    <div class="user-info">
        <form action="{{ url('admin/musics') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="title">عنوان:</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title"
                        class="form-control mt-2" />
                </div>
                <div class="col-6">
                    <label for="status">وضعیت نمایش:</label>
                    <select name="status" value="{{ old('status') }}" id="status" class="form-control mt-2">
                        <option value="show" selected>Show</option>
                        <option value="hidden">Hidden</option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label for="description">توضیحات:</label>
                    <textarea id="description" value="{{ old('description') }}" name="description" class="mt-2 form-control" rows="3"></textarea>
                </div>
                <div class="col-12 mt-2">
                    <label for="content">محتوا:</label>
                    <textarea id="content" value="{{ old('content') }}" name="content" class="mt-2 form-control" rows="5"></textarea>
                </div>
                <div class="col-6 mt-2">
                    <label for="cover">کاور:</label>
                    <input type="file" accept=".png,.jpeg,.jpg" value="{{ old('cover') }}" name="cover" id="cover"
                        class="form-control mt-2" />
                </div>
                <div class="col-6 mt-2">
                    <label for="music">موزیک:</label>
                    <input type="file" accept=".mp3"  value="{{ old('music') }}" name="music" id="music"
                        class="form-control mt-2" />
                </div>

                <div class="col-4 mt-2">
                    <label for="tags">تگ ها</label>
                    <select class="form-control js-example-basic-multiple" id="tags" name="tags[]"
                        multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-4 mt-2">
                    <label for="singer">خواننده ها</label>
                    <select  value="{{ old('singer') }}" class="form-control js-example-basic-singer" id="singer" name="singer_id">
                        @foreach ($singers as $singer)
                            <option value="{{ $singer->id }}">{{ $singer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4 mt-2">
                    <label for="menu">منو</label>
                    <select value="{{ old('menu') }}" class="js-example-basic-single form-control" id="menu" name="menu_id">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-2">
                    <label for="reaction">بازخورد فعال باشد</label>
                    <input type="checkbox" checked name="reactionable" value="1" id="reaction">
                </div>
                <div class="col-6 mt-2">
                    <label for="commentable">نظرات فعال باشد</label>
                    <input type="checkbox" checked name="commentable" value="1" id="commentable">
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
            $('.js-example-basic-singer').select2();
        });
    </script>
@endsection
