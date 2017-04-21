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
            <div class="artistImage" style="background-image: url(../imgs/artists/{{$artist['image_url']}})"></div>
        </div></a>
        @endforeach
        <a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>{{-- 
         --}}<a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>{{-- 
         --}}<a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>{{-- 
         --}}<a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>{{-- 
         --}}<a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>{{-- 
         --}}<a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>{{-- 
         --}}<a href=""><div class="artistItem">
            <h1>Artist Name</h1>
            <h2>Artist's home town</h2>
            <div class="artistMask"></div>
            <div class="artistImage"></div>
        </div></a>@if(Auth::check())
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