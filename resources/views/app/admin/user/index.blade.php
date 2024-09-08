@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">کاربران</p>
    </div>
    <div class="user-new-music">
        @if ($users->isEmpty())
            <p class="text-center pt-4">موردی یافت نشد!</p>
        @else
            @foreach ($users as $user)
                <div class="m-2 border rounded">
                    <div class="header mb-2 d-flex justify-content-between">
                        <div class="song-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;
                                @include('app.layouts.admin.dates', ['data' => $user])</p>
                        </div>
                        <div class="singer-name">
                            <p class="my-1 overflow-hidden">تعداد صفحات: &nbsp;
                                {{ count($user->musics()->get()) }}
                        </div>
                        <div class="song-name">
                            <p class="my-1 overflow-hidden"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;
                                {{ count($user->favorites()->get()) }}
                        </div>
                    </div>

                    <div>
                        <p class="my-2 mx-3 text-justify">{{ $user->name }}</p>
                        <div class="d-flex">
                            <form action="{{ url('admin/users/permission/' . $user->id) }}">
                                <button class="mx-1 btn btn-warning font-small" type="submit"><span>تغییر وضعیت نمایش
                                    </span></button>
                            </form>
                            <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                            </form>
                            <strong class="mx-2 mt-1">{{ $user->permission == 'user' ? 'کاربر عادی' : 'ادمین' }}</strong>
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
