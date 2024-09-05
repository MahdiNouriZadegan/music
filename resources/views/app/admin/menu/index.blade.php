@extends('app.layouts.admin.template')

@section('styles')
    @parent
@endsection

@section('content')
    @include('app.layouts.partials.success')
    <div class="panel-header d-flex justify-content-between">
        <p class="m-0">منو ها</p>
        <a href="{{ url('admin/menus/create') }}" class="link"><span>ساخت</span></a>
    </div>
    <div class="user-new-music">
        @foreach ($menus as $menu)
            <div class="m-2 border rounded">
                <div class="header mb-2 d-flex justify-content-between">
                    <div class="w-100 singer-name">
                        <p class="my-1 overflow-hidden"><i> تعداد صفحات:</i> &nbsp; <span
                                class="bg-warning text-dark px-2 rounded">{{ count($menu->musics()->get()) }}</span></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p class="my-2 mx-3 text-justify font-small">{{ $menu->name }}</p>
                        <div class="d-flex">
                            <form action="{{ url('admin/menus/'.$menu->id.'/edit') }}">
                                <button class="mx-1 btn btn-info text-light font-small"
                                    type="submit"><span>ویرایش</span></button>
                            </form>
                            <form action="{{ url('admin/menus/'.$menu->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="mx-1 btn btn-danger font-small" type="submit"><span>حذف</span></button>
                            </form>
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
