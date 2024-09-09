<header class="container">
    <div class="site-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset($logo_url) }}" alt="" class="logo p-1">
            <h4>{{ $site_name }}</h4>
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
                class="btn"> <a href="{{ url('/dashboard') }}" class="text-light">{{ auth()->user()->name }}</a> </button>
        </div>
        @endauth
        @guest
        <div class="authentication">
            <button class="btn"> <a href="{{route('register')}}" class="text-light">ثبت نام</a> </button> / <button
                class="btn"> <a href="{{route('login')}}" class="text-light">ورود</a> </button>
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
