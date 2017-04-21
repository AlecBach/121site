@extends('master')

@section('title', $artist['name'])
@section('pageID', 'artistsShow')

@section('content')
<div id="artistPage">
<div class="center">
    <div id="artistShow">
        <div class="artistItem">
            <div class="half left">
                <div class="artistImage" style="background-image: url(../imgs/artists/sample.jpeg{{$artist['image_url']}})"><div class="backBtn"><a href="/artists">Back to artists</a></div></div>
            </div>{{-- 
             --}}<div class="half right">
                 <div class="txtCnt">
                    <h1>{{$artist['name']}}</h1>
                    <h3>{{$artist['genre']}}</h3><hr>
                    <p>{{$artist['description']}}</p>
                </div>
            </div>
            
        </div>

        @if(Auth::check())
        {{-- 

         --}}<a href="./artists/{{$artist['id']}}/edit"><div class="artistItem addArtist">
            <h1><i class="fa fa-plus" aria-hidden="true"></i></h1>
            <h2>Add artist</h2>
            <div class="artistMask addMask"></div>
            <div class="artistImage"></div>
        </div></a> 
        @endif
    </div>
</div>
</div>
@endsection