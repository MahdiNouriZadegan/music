
<footer class="footer ">
    <div class="container">
        <!-- search-box-footer (sbf) -->
        <div class="sbf">
            <form action="">
                <input type="text" placeholder="آهنگ/خواننده و..." />
                <button class="link"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
            </form>
        </div>

        <div class="footer-content">
            <div class="footer-head">
                <h4>{{ $websetting_provider->description }}</h4>
            </div>
            <div class="footer-menu">
                <ul>
                    @foreach ($list_menus as $menu)
                    <li><a href="{{ set_url('menu', $menu->name) }}">{{ $menu->name }}</a></li> 
                 @endforeach
                </ul>
            </div>
            <div class="copy-right">
                <p>تمام حقوقی مادی و معنوی متعلق به سایت {{ $websetting_provider->title }} می باشد!</p>
            </div>
        </div>

    </div>

</footer>
