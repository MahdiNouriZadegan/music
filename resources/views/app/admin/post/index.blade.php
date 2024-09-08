@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">موزیک ها</p>
        <a href="{{ url('admin/musics/create') }}" class="link"><span>ساخت</span></a>
    </div>
    <div class="user-new-music">
        @foreach ($musics as $music)
            <div class="m-2 border rounded">
                <div class="header mb-2 d-flex justify-content-between">
                    <div class="song-name">
                        <p class="my-1 overflow-hidden"><i class="fa fa-microphone"></i> &nbsp; {{ $music->title }}</p>
                    </div>
                    <div class="w singer-name">
                        <p class="my-1 overflow-hidden"><i class="fa fa-user"></i> &nbsp;
                            {{ $music->singer()->first()->name }}</p>
                    </div>
                    <div class="w song-name">
                        <p class="my-1 overflow-hidden"><i class="text-warning fa fa-clock-o" aria-hidden="true"></i> &nbsp;
                            @include('app.layouts.admin.dates', ['data' => $music])</p>
                    </div>
                    <div class="w-25 singer-name">
                        <p class="my-1 overflow-hidden"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                            {{ $music->view }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <img src="{{ asset($music->cover) }}" class="image-new-post " alt=" ">
                    <div>
                        <p class="my-2 mx-3 text-justify font-small">{{ $music->description }}</p>

                        <div class="d-flex">
                            <form action="{{ url('admin/musics/change-status') }}" method="POST" class="form">
                                @csrf
                                <button class="mx-1 btn btn-warning font-small" name="id" value="{{ $music->id }}"
                                    type="submit"><span>تغییر وضعیت
                                        نمایش</span></button>
                            </form>
                            <form action="{{ url('admin/musics/' . $music->id . '/edit') }}" method="GET">
                                <button class="mx-1 btn btn-success font-small" type="submit"><span>ویرایش</span></button>
                            </form>
                            <form action="{{ url('admin/musics/' . $music->id) }}" class="form" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                            </form>
                            <!-- Button trigger modal -->
                            <a type="button" style="height: fit-content" class="btn btn-primary font-small" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                نمایش
                        </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-between">
                                            <h5 class="modal-title" id="exampleModalLabel">متن صفحه 
                                                ({{$music->title}})
                                            </h5>
                                            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{$music->content}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <audio src="{{ asset($music->music_url) }}" controls class="audio-panel"></audio>
                    </div>
                </div>
                <div class="header mb-2 d-flex justify-content-between">
                    <div class="w-25 song-name">
                        <p class="my-1 overflow-hidden"><i class="text-warning fa fa-comment" aria-hidden="true"></i> &nbsp;
                            {{ count($music->comments()->get()) }}</p>
                    </div>
                    <div class="w-25 singer-name">
                        <p class="my-1 overflow-hidden"><i>وضعیت نمایش:</i> &nbsp; <span
                                class="bg-warning text-dark px-2 rounded">{{ $music->status == 'hidden' ? 'مخفی' : 'عمومی' }}</span>
                        </p>
                    </div>
                    <div class="w-25 song-name">
                        <p class="my-1 overflow-hidden"><i>زیر منو:</i> &nbsp; <span
                                class="bg-warning text-dark px-2 rounded">{{ $music->menu()->first()->name }}</span></p>
                    </div>
                    <div class="w-25 singer-name">
                        <p class="my-1 overflow-hidden"><i class="fa fa-star" aria-hidden="true"></i> &nbsp; <span
                                class="bg-warning text-dark px-2 rounded">{{ count($music->favorites()->get()) }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    @parent
@endsection
