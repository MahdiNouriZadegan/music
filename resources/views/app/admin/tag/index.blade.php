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
                <div class="w song-name">
                    <p class="my-1 overflow-hidden"><i class="text-warning fa fa-comment" aria-hidden="true"></i> &nbsp; 89
                    </p>
                </div>
                <div class="w singer-name">
                    <p class="my-1 overflow-hidden"><i> تعداد صفحات:</i> &nbsp; <span
                            class="bg-warning text-dark px-2 rounded">0</span></p>
                </div>
                <div class="w song-name">
                    <p class="my-1 overflow-hidden">ادمین</p>
                </div>
            </div>
            <div class="d-flex">
                <img src="../../images/singer1.jpg " class="image-new-post " alt=" ">
                <div>
                    <p class="my-2 mx-3 text-justify font-small">مهدی نوری زادگان</p>
                    <div class="d-flex">
                        <form action="">
                            <button class="mx-1 btn btn-warning font-small" type="submit"><span>تغییر سطح دسترسی
                                </span></button>
                        </form>
                        <form action="../index.html">
                            <button class="mx-1 btn btn-danger font-small" type="submit"><span>بلاک </span></button>
                        </form>
                        <form action="../index.html">
                            <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
