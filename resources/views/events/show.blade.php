@extends('master')

@section('title', $event->name)
@section('pageID', 'event')
@section('js')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKVHnSfHjQBAYQ9kNDH2d2wBU5Z4wequs&libraries=places&callback=initMap"></script>
@endsection

@section('content')
{{-- Use variable to get if it's upcoming or past, and change the BG depending on it. --}}
<div class="{{$event->tense}}BG events">
	<div class="center">
		<div class="event">
			<div class="headerImg" style="background-image: url(..{{$event->image_url}})">
				<div class="backBtn"><a href="/{{$event->tense}}">Back to {{$event->tense}} events</a></div>
                @if(Auth::check())
                <div class="changeCont">
                    <div class="edit"><a href="/events/edit/{{$event['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></div>
                    <div class="delete"><a href="#modal"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></div>
                </div>
                @endif
				<div class="textCont">
					<h1>{{$event->name}}</h1>
					@if($event->price)<h4>${{$event->price}}</h4>@endif
					<h2>{{$event->location_name}}</h2>
					<h3>{{$event->date}}</h3>
				</div>
			</div>
			<div class="body">
				{{-- description, location, videos/extra imgs, ticketing site --}}
				<div id="eventDesc">{!!html_entity_decode($event->description)!!}</div>
				<p><a href="{{$event->tickets}}">Ticketing link</a></p>
				<div id="mapLocation">{{$event->location_id}}</div>
				<div id="mapCont">
					<a target="_blank" href="https://maps.google.com/?q={{$event->location_name}}"><div id="mapText"><i class="fa fa-external-link" aria-hidden="true"></i><h1>{{$event->location_name}}</h1></div></a>
					<div id="map"></div>
				</div>
				@if($event->images_array || $event->video_url)
				<div class="galleria">
					@if($event->images_array)
						@foreach($event->images_array as $image)
							<img src="..{{$image}}" alt="{{$image}}">
						@endforeach
					@endif
					@if($event->video_url)
						@foreach($event->video_url as $video)
							<a href="{{$video}}"><span class="video">Video</span></a>
						@endforeach
					@endif
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@if(Auth::check())
<div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Are you sure you want to delete {{$event['name']}}?</h1>
  <p>
    This action can not be undone, unless you have backed up the database.
  </p>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
  <a href="/events/delete/{{$event['id']}}" class="remodal-confirm">OK</a>
</div>
@endif
@endsection