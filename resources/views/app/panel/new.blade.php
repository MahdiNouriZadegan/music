@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
<div class="panel-header">
    <p class="m-0">جدید ترین ها</p>
</div>
<div class="user-new-music">
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
@endsection
