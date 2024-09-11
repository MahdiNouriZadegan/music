@extends('app.layouts.template')

@section('title')
    موسیقی کده
@endsection

@section('styles')
    @parent
    @vite('resources/css/player.css')
@endsection

@section('content')

    <!-- Content -->
    <div class="container">
        <!-- right side -->
        <div class="row">
            <div class="col-8 right-side">
                <div class="d-flex justify-content-between">
                    <div class="header-right-side d-flex align-items-center">
                        <div class="line-title d-flex align-items-center">
                            <div class="circle-line"></div>
                        </div>
                        <h5 class="py-2">{{ $music->title }}</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="view">
                            <span> {{ count($music->views()->where('music_id', $music->id)->get()) }} <i class="fa fa-eye" aria-hidden="true"></i></span>
                        </div>
                        <div class="favorite">
                            @guest
                                <span onclick="alert('برای اضافه شدن موسیقی به علاقه مندی ها باید ثبت نام یا وارد شوید!')"><i
                                        class="fa fa-star-o" aria-hidden="true"></i></span>
                            @endguest
                            @auth
                                @if ($favorite != null)
                                    <a href="{{ url('dashboard/favorites/delete/' . $music->id) }}" title="حذف از علاقه مندی ها"><i class="fa fa-star" aria-hidden="true"></i></a>
                                @else
                                    <a href="{{ url('dashboard/favorites/store/' . $music->id) }}" title="اضافه به علاقه مندی ها"><i class="fa fa-star-o"
                                            aria-hidden="true"></i></a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="music-detail">
                    <img src="{{ asset($music->cover) }}" class="music-image" alt="">
                    <div>
                        <p class="m-2 mx-3 line-height-music text-justify font-small">
                            {{ $music->content }}
                        </p>
                    </div>

                    <div class="music-player">
                        <div class="time-line-box d-flex">
                            <div class="time-line"></div>
                            <audio src="{{ asset($music->music_url) }}" id="audio"></audio>
                        </div>
                        <div class="controllers d-flex justify-content-between py-3 align-items-center">
                            <div class="music-controllers d-flex align-items-center">
                                <p id="go-back" class="link pointer py-2 mx-2" title="10 ثانیه به عقب"><span><i
                                            style="font-size: medium;" class="fa fa-step-forward"></i></span></i>
                                </p>
                                <p id="music-status" class="link pointer py-2 mx-2"><span><i id="music-icon"
                                            class="fa fa-play"></i></span></i>
                                </p>
                                <p id="go-ahead" class="link pointer py-2 mx-2" title="10 ثانیه به جلو"><span><i
                                            style="font-size: medium;" class="fa fa-step-backward"></i></span></i>
                                </p>
                                <p id="timer"></p>
                                <div class="d-flex volume-controller-box">
                                    <p class="volume-control"><i id="volume-icon" class="fa fa-volume-up"></i></p>
                                    <div class="volume-line-box">
                                        <div class="volume-line"></div>
                                    </div>
                                </div>
                                <p id="volume"></p>
                            </div>
                            <div class="music-cover">
                                <img src="{{ asset($logo_url) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-form mt-2">
                    @auth
                        <form action="{{ url('comment/store/' . $music->id) }}" method="POST">
                            @csrf
                            {{-- @guest
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">نام:</label>
                                    <input class="mt-2 form-control" id="name" type="text" placeholder="نام"
                                        name="name" />
                                </div>
                                <div class="col-6">
                                    <label for="email">ایمیل:</label>
                                    <input class="mt-2 form-control" type="email" placeholder="ایمیل" name="email" />
                                </div>
                            </div>
                        @endguest --}}
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="comment">نظر:</label>
                                    <textarea class="mt-2 form-control" name="comment" id="comment" cols="30" rows="5" placeholder="نظر"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-2"><span>ارسال</span></button>
                        </form>
                    @endauth
                    @guest
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>برای نظر دادن باید
                                <a href="">وارد</a>
                                شوید یا
                                <a href="">ثبت نام</a>
                                کنید.
                            </strong>
                        </div>

                        <script>
                            var alertList = document.querySelectorAll(".alert");
                            alertList.forEach(function(alert) {
                                new bootstrap.Alert(alert);
                            });
                        </script>
                    @endguest
                    @include('app.layouts.partials.errors')
                    @include('app.layouts.partials.success')
                </div>
                <hr>

                <div class="comments">
                    <button class="btn mx-3 badge-comment btn-primary position-relative">
                        نظرات
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">{{ count($music->comments()->where('status', 'show')->get()) }}</span>
                    </button>
                    @if ($music->comments()->where('status', 'show')->first() == null)
                        <p class="text-center mt-2">شما اولین نظر را بنویسید!</p>
                    @endif
                    @foreach ($music->comments()->where('status', 'show')->get() as $comment)
                        <div class="m-2 p-2 border rounded">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="my-0 mx-2"><span class="text-secondary"><i class="fa fa-user"
                                                aria-hidden="true"></i></span> {{ $comment->user()->first()->name }}</p>
                                </div>
                                <div class="feedback-to-comment d-flex">
                                    <form action="{{ url('comment/feedback/' . $comment->id) }}" method="POST"
                                        class="m-0 p-0">
                                        @csrf
                                        <button type="submit" name="feedback" value="1"
                                            class="feedback-btn m-0 mx-3"><i class="fa fa-thumbs-o-up"></i><span>
                                                {{ count($comment->feedbacks()->where('feedback', 1)->get()) }}
                                            </span></button>
                                    </form>
                                    <form action="{{ url('comment/feedback/' . $comment->id) }}" method="POST"
                                        class="m-0 p-0">
                                        @csrf
                                        <button type="submit" name="feedback" value="2"
                                            class="feedback-btn m-0 mx-2"><i class="fa fa-thumbs-o-down flip"></i> <span>
                                                {{ count($comment->feedbacks()->where('feedback', 2)->get()) }}
                                            </span></button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p class="text-justify font-small mt-2 mx-4">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4">
                @include('app.layouts.partials.left-side')
                <!-- short link box (slb) -->
                <div class="slb mt-3 border">
                    <small><i>لینک کوتاه</i></small>
                    <!-- short link -->
                    <div class="sl d-flex mt-3 justify-content-between">
                        <i class="fa fa-copy" id="copy-link"></i>
                        <p class="m-0" id="short-link">{{ $short_link }}</p>
                    </div>
                    <p class="text-success mx-3" id="success-copy"><i>با موفقیت کپی شد!</i></p>
                </div>
                <!-- this is for user reaction -->
                <!-- short link box (slb) -->
                <div class="slb mt-3 border pb-2">
                    <small><i>نظر شما</i></small>
                    <form action="{{ url('reaction/' . $music->id) }}" method="post"
                        class="d-flex justify-content-between reaction-form mt-3 mx-3">
                        @csrf
                        <label for="great">😍
                            <br>
                            <span>{{ count($music->reactions()->where('reaction', '1')->get()) }}</span>
                        </label>
                        <input type="submit" hidden value="1" name="reaction" id="great">

                        <label for="good">😀
                            <br>
                            <span>{{ count($music->reactions()->where('reaction', '2')->get()) }}</span>
                        </label>
                        <input type="submit" hidden value="2" name="reaction" id="good">

                        <label for="middle">😐
                            <br>
                            <span>{{ count($music->reactions()->where('reaction', '3')->get()) }}</span>
                        </label>
                        <input type="submit" hidden value="3" name="reaction" id="middle">

                        <label for="bad">😑
                            <br>
                            <span>{{ count($music->reactions()->where('reaction', '4')->get()) }}</span>
                        </label>
                        <input type="submit" hidden value="4" name="reaction" id="bad">

                        <label for="veryBad">😣
                            <br>
                            <span>{{ count($music->reactions()->where('reaction', '5')->get()) }}</span>
                        </label>
                        <input type="submit" hidden value="5" name="reaction" id="veryBad">
                    </form>
                    @session('reaction_status')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('reaction_status') }}
                        </div>

                        <script>
                            var alertList = document.querySelectorAll(".alert");
                            alertList.forEach(function(alert) {
                                new bootstrap.Alert(alert);
                            });
                        </script>
                    @endsession
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    @parent
    @vite('resources/js/player.js')
@endsection
