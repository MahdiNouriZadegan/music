@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">خواننده ها</p>
        <a href="" class="link"><span>ساخت</span></a>
    </div>
    @if ($singers->isEmpty())
        <p class="text-center pt-4">موردی یافت نشد!</p>
    @else
        @foreach ($singers as $singer)
            <div class="user-new-music">
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">

                        <div class="w-50 singer-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-user"></i> &nbsp; {{ $singer->name }}</p>
                        </div>
                        <div class="w-25 song-name">
                            <p class="my-1 overflow-hidden"><i class="text-warning fa fa-clock-o" aria-hidden="true"></i>
                                &nbsp; 1403/2/6</p>
                        </div>
                        <div class="w-25 singer-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp; 899</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="../../images/singer1.jpg " class="image-new-post " alt=" ">
                        <div>
                            <div class="d-flex">
                                <form action="">
                                    <a href="" class="mx-1 btn btn-primary font-small"><span>نمایش</span></a>
                                </form>
                                <form action="../index.html">
                                    <button class="mx-1 btn btn-success font-small"
                                        type="submit"><span>ویرایش</span></button>
                                </form>
                                <form action="../index.html">
                                    <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="w song-name">
                            <p class="my-1 overflow-hidden"><i class="text-warning fa fa-comment" aria-hidden="true"></i>
                                &nbsp; 89</p>
                        </div>
                        <div class="w singer-name">
                            <p class="my-1 overflow-hidden"><i>تعداد:</i> &nbsp; <span
                                    class="bg-warning text-dark px-2 rounded">288</span></p>
                        </div>
                        <div class="w song-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-star" aria-hidden="true"></i> &nbsp; <span
                                    class="bg-warning text-dark px-2 rounded">277</span></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

@section('scripts')
    @parent
@endsection
