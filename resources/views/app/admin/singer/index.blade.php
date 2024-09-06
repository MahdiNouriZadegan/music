@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">خواننده ها</p>
        <a href="{{ url('admin/singers/create') }}" class="link"><span>ساخت</span></a>
    </div>
    @if ($singers->isEmpty())
        <p class="text-center pt-4">موردی یافت نشد!</p>
    @else
        @foreach ($singers as $singer)
            <div class="user-new-music">
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">

                        <div class="w-50 singer-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-user"></i> &nbsp; {{ $singer->name }}</p>
                        </div>
                        <div class="w-25 song-name">
                            <p class="my-1 overflow-hidden"><i class="text-warning fa fa-clock-o" aria-hidden="true"></i>
                                &nbsp;
                                @include('app.layouts.admin.dates')
                            </p>
                        </div>
                        <div class="w-25 singer-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                {{ $singer->musics->sum('view') }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset($singer->image) }}" class="image-new-post " alt=" ">
                        <div>
                            <div class="d-flex">
                                <form action="{{ url('admin/singers/' . $singer->id . '/edit') }}" method="GET">
                                    <button class="mx-1 btn btn-success font-small"
                                        type="submit"><span>ویرایش</span></button>
                                </form>
                                <form action="{{ url('admin/singers/' . $singer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="w song-name">
                            <p class="my-1 overflow-hidden"><i class="text-warning fa fa-comment" aria-hidden="true"></i>
                                &nbsp;
                                {{ $singer->comments_count }}
                            </p>
                        </div>
                        <div class="w singer-name">
                            <p class="my-1 overflow-hidden"><i>تعداد:</i> &nbsp; <span
                                    class="bg-warning text-dark px-2 rounded">{{ count($singer->musics) }}</span></p>
                        </div>
                        <div class="w song-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-star" aria-hidden="true"></i> &nbsp; <span
                                    class="bg-warning text-dark px-2 rounded">{{ $singer->favorites_count?$singer->favorites_count:0 }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('scripts')
    @parent
@endsection
