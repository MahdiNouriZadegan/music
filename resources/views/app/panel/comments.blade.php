@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        <p class="m-0">نظرات ({{ count($comments) }})</p>
    </div>
    <div class="user-comment">
        @if ($comments->isEmpty())
            <p class="text-center my-3">نظری یافت نشد!</p>
        @else
            @foreach ($comments as $comment)
                @if ($comment->music->status == 'show')
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="w-50 song-name">
                            <p class="my-1"><i class="fa fa-user"></i> &nbsp; شما به صفحه آهنگ <span class="bg-primary px-2 rounded">{{ $comment->music->title }}</span> نظر داده
                                اید
                            </p>
                        </div>
                        <div class="w-50 singer-name">
                            <p class="my-1"><i class="fa fa-user"></i> &nbsp; شما به صفحه آهنگ <span @class(['px-2', 'rounded', 'bg-warning text-dark' => $comment->status == 'hidden','bg-success' => $comment->status == 'show']) class="px-2 rounded">{{ $comment->status == 'hidden' ? 'منتشر نشده است!' : 'منتشر شده است!' }}</span></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <img src="{{ asset($comment->music->cover) }} " class="image-new-post " alt=" ">
                        <div>
                            <p class="my-2 mx-3 text-justify font-small">{{ $comment->comment }}</p>
                            <a href="{{ set_url('detail', $comment->music->id) }}" class="btn btn-warning mx-3"><small>مشاهده</small></a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection

@section('scripts')
    @parent
@endsection
