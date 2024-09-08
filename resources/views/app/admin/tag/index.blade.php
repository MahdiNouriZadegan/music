@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">تگ ها</p>
        <a href="{{ url('admin/tags/create') }}" class="link"><span>ساخت</span></a>
    </div>
    <div class="user-new-music">
        @php
            $count = 0;
        @endphp
        @foreach ($tags as $tag)
            @foreach ($tag->musics()->get() as $post)
                @php
                    $count += count($post->comments()->get());
                @endphp
            @endforeach
        @endforeach

        @if ($tags->isEmpty())
            <p class="text-center pt-4">موردی یافت نشد!</p>
        @else
            @foreach ($tags as $tag)
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="w song-name">
                            <p class="my-1 overflow-hidden"><i class="text-warning fa fa-comment" aria-hidden="true"></i>
                                &nbsp;

                                {{ $count }}
                            </p>
                        </div>
                        <div class="w singer-name">
                            <p class="my-1 overflow-hidden"><i> تعداد صفحات:</i> &nbsp; <span
                                    class="bg-warning text-dark px-2 rounded">{{ count($tag->musics()->get()) }}</span></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <p class="my-2 mx-3 text-justify font-small">{{ $tag->name }}</p>
                            <div class="d-flex">
                                <form action="{{ url('admin/tags/' . $tag->id . '/edit') }}" method="GET">
                                    @csrf
                                    <button class="mx-1 btn btn-info text-light font-small" type="submit"><span>ویرایش
                                        </span></button>
                                </form>
                                <form action="{{ url('admin/tags/' . $tag->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('scripts')
    @parent
@endsection
