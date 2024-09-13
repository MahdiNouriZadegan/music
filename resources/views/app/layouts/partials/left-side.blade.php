<div class="bg-left-side">
    <div class="d-flex header align-items-center">
        <h5 class="py-2">پربیننده ترین ها</h5>
        <div class="line"></div>
    </div>
    @foreach ($list_most_view_musics as $music)
        <div class="m-1 p-2 border rounded box">
            <a href="{{ set_url('detail', $music->title) }}" class="popular-link">{{ $music->title }}</a>
            <p class="text-dark font-small my-1">-> {{ $music->singer()->first()->name }}</p>
            <i>
                <p class="text-secondary m-0 font-small">بازدید: {{ $music->view }}</p>
            </i>
        </div>
    @endforeach
</div>
