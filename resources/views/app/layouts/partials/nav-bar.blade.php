<header class="container">
    <div class="site-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="images/music.png" alt="" class="logo p-1">
            <h4>موسیقی کده</h4>
        </div>
        <div class="search-header ">
            <form action="" class="">
                <input type="text" placeholder="دنبال چی می گردید؟" />
                <button>جستجو کن</button>
            </form>
        </div>
        @auth
        <div class="authentication">
            <button
                class="btn"> <a class="text-light">{{ auth()->user()->name }}</a> </button>
        </div>
        @endauth
        @guest
        <div class="authentication">
            <button class="btn"> <a>ثبت نام</a> </button> / <button
                class="btn"> <a>ورود</a> </button>
        </div>
        @endguest

    </div>
    <div class="menu-header">
        <ul>
            <li><a href="">خانه</a></li>
            <li><a href="">جدید ها</a></li>
            <li><a href="">پاپ</a></li>
            <li><a href="">سنتی</a></li>
        </ul>
    </div>

</header>
