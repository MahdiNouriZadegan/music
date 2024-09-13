@extends('app.layouts.template')

@section('title')
    جستجو
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 right-side">
                <div class="header-right-side d-flex align-items-center">
                    <div class="line-title d-flex align-items-center">
                        <div class="circle-line"></div>
                    </div>
                    <h5 class="py-2 ">جدید ترین آهنگ ها</h5>
                </div>
                @if ($musics->isEmpty())
                    <div class="search-result border rounded">
                        <h4 class="mt-5 mb-5">نتیجه ای یافت نشد!</h4>
                    </div>
                @else
                    @foreach ($musics as $music)
                        <div class="m-2 border rounded">
                            <div class="header mb-2 d-flex justify-content-between">
                                <div class="w-60 song-name">
                                    <p class="my-1"><i class="fa fa-microphone"></i> &nbsp {{ $music->title }}</p>
                                </div>
                                <div class="w-40 singer-name">
                                    <p class="my-1"><i class="fa fa-user"></i> &nbsp {{ $music->singer()->first()->name }}</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <img src="{{ asset($music->cover) }}" class="image-new-post " alt=" ">
                                <div>
                                    <p class="m-2 mx-3 text-justify font-small">{{ $music->description }}</p>
                                    <a href="{{ set_url('detail', $music->title) }}" class="link mx-3"><span>پخش</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- <div class="m-2 border rounded">
                <div class="header mb-2 d-flex justify-content-between">
                    <div class="w-60 song-name">
                        <p class="my-1"><i class="fa fa-microphone"></i> &nbsp بهترین خاطره</p>
                    </div>
                    <div class="w-40 singer-name">
                        <p class="my-1"><i class="fa fa-user"></i> &nbsp محسن چاووشی</p>
                    </div>
                </div>
                <div class="d-flex">
                    <img src=" images/singer1.jpg " class="image-new-post " alt=" ">
                    <div>
                        <p class="m-2 mx-3 text-justify font-small">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                            با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                            برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                            ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده</p>
                        <a href="" class="link mx-3"><span>پخش</span></a>
                    </div>
                </div>
            </div>
            <div class="m-2 border rounded">
                <div class="header mb-2 d-flex justify-content-between">
                    <div class="w-60 song-name">
                        <p class="my-1"><i class="fa fa-microphone"></i> &nbsp بهترین خاطره</p>
                    </div>
                    <div class="w-40 singer-name">
                        <p class="my-1"><i class="fa fa-user"></i> &nbsp محسن چاووشی</p>
                    </div>
                </div>
                <div class="d-flex">
                    <img src=" images/singer1.jpg " class="image-new-post " alt=" ">
                    <div>
                        <p class="m-2 mx-3 text-justify font-small">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                            با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                            برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                            ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده</p>
                        <a href="" class="link mx-3"><span>پخش</span></a>
                    </div>
                </div>
            </div> --}}

            </div>
            <div class="col-4">
                @include('app.layouts.partials.left-side')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
