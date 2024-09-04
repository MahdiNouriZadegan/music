@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header d-flex justify-content-between">
    <p class="m-0">کاربران</p>
    <a href="" class="link"><span>ساخت</span></a>
</div>
<div class="user-new-music">
    <div class="m-2 border rounded">
        <div class="header mb-2 d-flex justify-content-between">
            <div class="w-50 singer-name">
                <p class="my-1 overflow-hidden"><i> صفحه:</i> &nbsp; <span class="bg-warning text-dark px-2 rounded">برنامه نویسان</span></p>
            </div>
            <div class="w-25 song-name">
                <p class="my-1 overflow-hidden"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp; 1403/2/2</p>
            </div>
            <div class="w-25 singer-name">
                <p class="my-1 overflow-hidden"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; مهدی</p>
            </div>
        </div>

        <div>
            <p class="my-2 mx-3 text-justify font-small">مهدی نوری زادگان</p>
            <div class="d-flex">
                <form action="">
                    <button class="mx-1 btn btn-warning font-small" type="submit"><span>تغییر وضعیت نمایش </span></button>
                </form>
                <form action="../index.html">
                    <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                </form>
                <strong class="mx-2 mt-1">در حال حاظر نمایش میدهد</strong>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
@endsection
