@extends('app.layouts.template')

@section('title')
    موسیقی کده
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
                    <h5 class="py-2 ">{{ $menu->name }}</h5>
                </div>
                @if ($musics->isEmpty())
                    <p class="text-center my-5 py-2">هیچ موردی یافت نشد!</p>
                @else
                    @foreach ($musics as $music)
                        <div class="m-2 border rounded">
                            <div class="header mb-2 d-flex justify-content-between">
                                <div class="w-60 song-name">
                                    <p class="my-1"><i class="fa fa-microphone"></i> &nbsp {{ $music->title }}</p>
                                </div>
                                <div class="w-40 singer-name">
                                    <p class="my-1"><i class="fa fa-user"></i> &nbsp {{ $music->singer()->first()->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <img src="{{ asset($music->cover) }}" class="image-new-post " alt=" ">
                                <div>
                                    <p class="m-2 mx-3 text-justify font-small">لورم ایپسوم متن ساختگی با تولید سادگی
                                        نامفهوم از
                                        {{ $music->description }}</p>
                                    <br>
                                    <a href="{{ set_url('detail', $music->title) }}" class="link link-music mx-3"><span>پخش</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

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
