<div class="col-3 left-side-panel">
    <div class="left-side-controllers">
        <ul>
            <li><a href="">اطلاعات کاربری</a></li>
            <li><a href="{{ url('dashboard/favorites') }}">علاقه مندی ها</a></li>
            <li><a href="{{ url('dashboard/comments') }}">نظرات</a></li>
            <li><a href="{{ url('dashboard/new') }}">آهنگ های جدید</a></li>
            @admin
                <li><a href="{{ url('admin/') }}">ادمین</a></li>
            @endadmin
        </ul>
    </div>
</div>