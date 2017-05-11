@extends('master')

@section('title', 'Artists')
@section('pageID', 'artists')

@section('content')

    <div id="artistCont"> 
        @foreach($artists as $artist) 
        <a href="/artists/{{$artist['id']}}"><div class="artistItem">
            <h1>{{$artist['name']}}</h1>
            <h2>{{$artist['hometown']}}</h2>
            <div class="artistMask"></div>
            <div class="artistImage" style="background-image: url(..{{$artist['image_url']}})"></div>
        </div></a>
        @endforeach
        @if(Auth::check())
        {{-- 

         --}}<a href="./artists/add"><div class="artistItem addArtist">
            <h1><i class="fa fa-plus" aria-hidden="true"></i></h1>
            <h2>Add artist</h2>
            <div class="artistMask addMask"></div>
            <div class="artistImage"></div>
        </div></a> 
        @endif
    </div>


@endsection