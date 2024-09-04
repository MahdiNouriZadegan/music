@extends('app.layouts.template')

@section('title')
    موسیقی کده
@endsection

@section('styles')
    @parent
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
                        <h5 class="py-2 ">بهترین خاطره</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="view">
                            <span>2 <i class="fa fa-eye" aria-hidden="true"></i></span>
                        </div>
                        <div class="favorite">

                            <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="music-detail">
                    <img src=" images/singer1.jpg " class="music-image " alt=" ">
                    <div>
                        <p class="m-2 mx-3 line-height-music text-justify font-small">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                            ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده</p>
                    </div>

                    <div class="music-player">
                        <div class="time-line-box d-flex">
                            <div class="time-line"></div>
                            <audio src="audios/audio.mp3" id="audio"></audio>
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
                                <img src="images/music.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-form mt-2">
                    <form action="">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">نام:</label>
                                <input class="mt-2 form-control" id="name" type="text" placeholder="نام" name="name" />
                            </div>
                            <div class="col-6">
                                <label for="email">ایمیل:</label>
                                <input class="mt-2 form-control" type="email" placeholder="ایمیل" name="email" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label for="comment">نظر:</label>
                                <textarea class="mt-2 form-control" name="comment" id="comment" cols="30" rows="5" placeholder="نظر"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-success mt-2"><span>ارسال</span></button>
                    </form>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>برای راحتی خود می توانید
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

                </div>
                <hr>

                <div class="comments">
                    <button class="btn mx-3 badge-comment btn-primary position-relative">
                        نظرات
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">24</span>
                    </button>

                    <div class="m-2 p-2 border rounded">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="my-0 mx-2"><span class="text-secondary"><i class="fa fa-user"
                                            aria-hidden="true"></i></span> مهدی</p>
                            </div>
                            <div class="feedback-to-comment d-flex">
                                <p class="m-0 mx-3"><i class="fa fa-thumbs-o-up"></i> <span>20</span></p>
                                <p class="m-0 mx-2"><i class="fa fa-thumbs-o-down flip"></i> <span>1</span></p>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <p class="text-justify font-small mt-2 mx-4">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                                کتابهای زیادی در شصت و سه درصد گذشته حال و آینده
                            </p>
                        </div>
                    </div>
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
                        <p class="m-0" id="short-link">localhost/music?q=5</p>
                    </div>
                    <p class="text-success mx-3" id="success-copy"><i>با موفقیت کپی شد!</i></p>
                </div>
                <!-- this is for user reaction -->
                <!-- short link box (slb) -->
                <div class="slb mt-3 border pb-2">
                    <small><i>نظر شما</i></small>
                    <form action="" method="get" class="d-flex justify-content-between reaction-form mt-3 mx-3">
                        <label for="great">😍
                            <br>
                            <span>1</span>
                        </label>
                        <input type="submit" hidden value="1" name="reaction" id="great">

                        <label for="good">😀
                            <br>
                            <span>1</span>
                        </label>
                        <input type="submit" hidden value="2" name="reaction" id="good">

                        <label for="middle">😐
                            <br>
                            <span>1</span>
                        </label>
                        <input type="submit" hidden value="3" name="reaction" id="middle">

                        <label for="bad">😑
                            <br>
                            <span>1</span>
                        </label>
                        <input type="submit" hidden value="4" name="reaction" id="bad">

                        <label for="veryBad">😣
                            <br>
                            <span>1</span>
                        </label>
                        <input type="submit" hidden value="5" name="reaction" id="veryBad">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    @parent
@endsection