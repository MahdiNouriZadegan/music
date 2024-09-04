@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header d-flex justify-content-between align-items-center">
    <p class="m-0">علاقه مندی ها</p>
    <a class="btn btn-danger">حذف همه <i class="fa fa-trash" aria-hidden="true"></i></a>
</div>
<div class="user-favorite">
    <div class="m-2 border rounded">
        <div class="header mb-2 d-flex justify-content-between">
            <div class="w-60 song-name">
                <p class="my-1"><i class="fa fa-microphone"></i> &nbsp; بهترین خاطره</p>
            </div>
            <div class="w-40 singer-name">
                <p class="my-1"><i class="fa fa-user"></i> &nbsp; محسن چاووشی</p>
            </div>
        </div>
        <div class="d-flex">
            <img src="../images/singer1.jpg " class="image-new-post " alt=" ">
            <div>
                <p class="my-2 mx-3 text-justify font-small">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف
                    بهبود ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده</p>
                <a href="" class="link mx-3"><span>پخش</span></a>
                <a href="" class="link"><span>حذف</span></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
@endsection
