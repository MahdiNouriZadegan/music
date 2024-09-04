@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        فرم ساخت صفحه موزیک
    </div>
    <div class="user-info">
        <form action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <label for="name">عنوان:</label>
                    <input type="text" name="name" id="name" class="form-control mt-2" />
                </div>
                <div class="col-6">
                    <label for="status">وضعیت نمایش:</label>
                    <select name="status" id="status" class="form-control mt-2">
                        <option value="show" selected>Show</option>
                        <option value="hidden">Hidden</option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label for="description">توضیحات:</label>
                    <textarea id="description" name="description" class="mt-2 form-control" rows="3"></textarea>
                </div>
                <div class="col-12 mt-2">
                    <label for="content">محتوا:</label>
                    <textarea id="content" name="content" class="mt-2 form-control" rows="5"></textarea>
                </div>
                <div class="col-6 mt-2">
                    <label for="cover">کاور:</label>
                    <input type="file" accept=".png,.jpeg,.jpg" name="cover" id="cover"
                        class="form-control mt-2" />
                </div>
                <div class="col-6 mt-2">
                    <label for="music">موزیک:</label>
                    <input type="file" accept=".mp3" value="مهدی نوری" name="music" id="music"
                        class="form-control mt-2" />
                </div>

                <div class="col-6 mt-2">
                    <label for="tags">تگ ها</label>
                    <select class="form-control js-example-basic-multiple" id="tags" name="tags[]"
                        multiple="multiple">
                        <option value="AL">Alabama</option>
                        ...
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
                <div class="col-6 mt-2">
                    <label for="menu">منو</label>
                    <select class="js-example-basic-single form-control" id="menu" name="menu_id">
                        <option value="AL">Alabama</option>
                        ...
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
                <div class="col-6 mt-2">
                    <label for="reaction">بازخورد فعال باشد</label>
                    <input type="checkbox" name="reaction" value="1" id="reaction">
                </div>
                <div class="col-6 mt-2">
                    <label for="commentable">نظرات فعال باشد</label>
                    <input type="checkbox" name="commentable" value="1" id="commentable">
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
