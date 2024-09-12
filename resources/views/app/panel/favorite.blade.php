@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header d-flex justify-content-between align-items-center">
        <p class="m-0">علاقه مندی ها</p>
        <a href="{{ url('dashboard/favorites/delete-all') }}" class="btn btn-danger">حذف همه <i class="fa fa-trash" aria-hidden="true"></i></a>
    </div>
    <div class="user-favorite">
        @foreach ($favorites as $favorite)
            <div class="m-2 border rounded">
                <div class="header mb-2 d-flex justify-content-between">
                    <div class="w-60 song-name">
                        <p class="my-1"><i class="fa fa-microphone"></i> &nbsp; {{ $favorite->music->title }}</p>
                    </div>
                    <div class="w-40 singer-name">
                        <p class="my-1"><i class="fa fa-user"></i> &nbsp; {{ $favorite->music->singer->name }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <img src="{{ asset($favorite->music->cover) }}" class="image-new-post " alt=" ">
                    <div>
                        <p class="my-2 mx-3 text-justify font-small">
                            {{ $favorite->music->description }}
                        </p>
                        <div class="my-2">
                            <a href="{{ set_url('detail', $favorite->music->title) }}" class="link mx-3"><span>پخش</span></a>
                            <a href="{{ url('dashboard/favorites/delete/' . $favorite->music->id) }}" class="link"><span>حذف</span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    @parent
@endsection
