<div class="container swiper singers-slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach ($list_singers as $singer)
            <div class="swiper-slide">
                <img src="{{ asset($singer->image) }}" alt="" />
                <a href="{{ url('singer/'. $singer->id) }}">{{ $singer->name }}</a>
            </div>
        @endforeach
    </div>
</div>
