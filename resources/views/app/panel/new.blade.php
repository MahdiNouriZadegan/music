@extends('app.layouts.user.template')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="panel-header">
        <p class="m-0">جدید ترین ها</p>
    </div>
 @if ($new_musics->isEmpty())
    <p class="text-center py-3">پیدا نشد!</p>
 @else
 @foreach ($new_musics as $music)
 <div class="user-new-music">
     <div class="m-2 border rounded">
         <div class="header mb-2 d-flex justify-content-between">
             <div class="w-60 song-name">
                 <p class="my-1"><i class="fa fa-microphone"></i> &nbsp; {{ $music->title }}</p>
             </div>
             <div class="w-40 singer-name">
                 <p class="my-1"><i class="fa fa-user"></i> &nbsp; {{ $music->singer()->first()->name }}</p>
             </div>
         </div>
         <div class="d-flex">
             <img src="{{ asset($music->cover) }}" class="image-new-post " alt=" ">
             <div>
                 <p class="my-2 mx-3 text-justify font-small">{{ $music->description }}</p>
                 <a href="{{ set_url('detail', $music->title) }}" class="link mx-3"><span>پخش</span></a>
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
