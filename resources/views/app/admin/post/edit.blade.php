@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        فرم ویرایش صفحه موزیک
    </div>
    <div class="user-info">
        <form action="{{ url('admin/musics/'.$music->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label for="title">عنوان:</label>
                    <input type="text" name="title" value="{{ $music->title }}" id="title"
                        class="form-control mt-2" />
                </div>
                <div class="col-6">
                    <label for="status">وضعیت نمایش:</label>
                    <select name="status" id="status" class="form-control mt-2">
                        @if ($music->status == 'hidden')
                            <option value="show">Show</option>
                            <option value="hidden" selected>Hidden</option>
                        @else
                            <option value="show" selected>Show</option>
                            <option value="hidden">Hidden</option>
                        @endif
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label for="description">توضیحات:</label>
                    <textarea id="description" value="{{ $music->description }}" name="description" class="mt-2 form-control"
                        rows="3">{{ $music->description }}</textarea>
                </div>
                <div class="col-12 mt-2">
                    <label for="content">محتوا:</label>
                    <textarea id="content" value="{{ $music->content }}" name="content" class="mt-2 form-control" rows="5">{{ $music->content }}</textarea>
                </div>
                <div class="col-6 row mt-2">

                    <label for="cover">کاور:</label>
                    <input type="file" accept=".png,.jpeg,.jpg" name="cover" id="cover"
                        class="form-control mt-2" />
                </div>
                <div class="col-6 mt-2">
                    <label for="music">موزیک:</label>
                    <input type="file" accept=".mp3" name="music_file" id="music"
                        class="form-control mt-2" />
                </div>

                <div class="col-6 text-center">
                    <img src="{{ asset($music->cover) }}" class="mt-2" width="100px" alt="">
                </div>
                <div class="col-6">
                    <audio src="{{ asset($music->music_url) }}" class="w-75 mt-2" controls></audio>
                </div>

                <div class="col-4 mt-2">
                    <label for="tags">تگ ها</label>
                    <select class="form-control js-example-basic-multiple" id="tags"
                        name="tags[]" multiple="multiple">
                        @foreach ($inTags as $tag)
                            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                        @endforeach
                        @foreach ($notInTags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-4 mt-2">
                    <label for="singer">خواننده ها</label>
                    <select class="form-control js-example-basic-singer" id="singer"
                        name="singer_id">
                        @foreach ($singers as $singer)
                            <option value="{{ $singer->id }}" {{ $singer->id == $music->singer_id ? 'selected' : null }}>
                                {{ $singer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4 mt-2">
                    <label for="menu">منو</label>
                    <select class="js-example-basic-single form-control" id="menu"
                        name="menu_id">
                        @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $menu->id == $music->menu_id ? 'selected' : null }}>
                            {{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-2">
                    <label for="reaction">بازخورد فعال باشد</label>
                    <input type="checkbox" {{ $music->reactionable == 'active'?'checked': null }} name="reactionable" value="1"
                        id="reaction">
                </div>
                <div class="col-6 mt-2">
                    <label for="commentable">نظرات فعال باشد</label>
                    <input type="checkbox"{{ $music->commentable == 'active'?'checked': null }} name="commentable" value="1"
                        id="commentable">
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
