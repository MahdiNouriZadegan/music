@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">نظرات</p>
    </div>
    <div class="user-new-music">
        @if ($comments->isEmpty())
            <p class="text-center pt-4">موردی یافت نشد!</p>
        @else
            @foreach ($comments as $comment)
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="w-50 singer-name">
                            <p class="my-1 overflow-hidden"><i> صفحه:</i> &nbsp; <span
                                    class="bg-warning text-dark px-2 rounded">{{ $comment->music()->first()->title }}</span></p>
                        </div>
                        <div class="w-25 song-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;
                                @include('app.layouts.admin.dates', ['data' => $comment])</p>
                        </div>
                        <div class="w-25 singer-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; {{ $comment->user()->first()->name }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="my-2 mx-3 text-justify">{{ $comment->comment }}</p>
                        <div class="d-flex">
                            <form action="{{ url('admin/comments/change-status/' . $comment->id) }}">
                                <button class="mx-1 btn btn-warning font-small" type="submit"><span>تغییر وضعیت نمایش
                                    </span></button>
                            </form>
                            <form action="{{ url('admin/comments/' . $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                            </form>
                            <strong class="mx-2 mt-1">{{ $comment->status == 'show'?'در حال حاظر نمایش میدهد!':'نظر مخفی می باشد!' }}</strong>
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
