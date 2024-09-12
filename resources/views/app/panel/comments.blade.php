@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        <p class="m-0">نظرات ({{ count($comments) }})</p>
    </div>
    <div class="user-comment">
        @if ($comments->isEmpty())
            <p class="text-center my-3">نظری یافت نشد!</p>
        @else
            @foreach ($comments as $comment)
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="w-100 song-name">
                            <p class="my-1"><i class="fa fa-user"></i> &nbsp; شما به صفحه آهنگ <span class="bg-primary px-2 rounded">{{ $comment->music->title }}</span> نظر داده
                                اید
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <img src="../images/singer1.jpg " class="image-new-post " alt=" ">
                        <div>
                            <p class="my-2 mx-3 text-justify font-small">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف
                            </p>
                            <a href="" class="btn btn-warning mx-3"><small>مشاهده</small></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('scripts')
    @parent
@endsection
