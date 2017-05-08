@extends('master')

@section('title', $artist['name'])
@section('pageID', 'artistsShow')

@section('content')
<div id="artistPage">
<div class="center">
    <div id="artistShow">
        <div class="artistItem">
            <div class="half left">
                <div class="artistImage" style="background-image: url(..{{$artist['image_url']}})">
                    <div class="backBtn"><a href="/artists">Back to artists</a></div>
                     @if(Auth::check())
                    <div class="changeCont">
                        <div class="edit"><a href="/artists/edit/{{$artist['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></div>
                        <div class="delete"><a href="#modal"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></div>
                    </div>
                    @endif
                </div>
            </div>{{-- 
             --}}<div class="half right">
                 <div class="txtCnt">
                    <h1>{{$artist['name']}}</h1>
                    <h3>{{$artist['genre']}}</h3><hr>
                    <p>{{$artist['description']}}</p>
                </div>
            </div>
            
        </div>

       
    </div>
</div>
</div>
 @if(Auth::check())
<div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Are you sure you want to delete {{$artist['name']}}?</h1>
  <p>
    This action can not be undone, unless you have backed up the database.
  </p>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
  <a href="/artists/delete/{{$artist['id']}}" class="remodal-confirm">OK</a>
</div>
@endif
@endsection