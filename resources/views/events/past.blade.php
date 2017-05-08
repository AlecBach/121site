@extends('master')

@section('title', 'Past Events')
@section('pageID', 'past')

@section('content')
<div class="pastBG events">
	<div class="center">
		@if(Auth::check())
		<div class="createEvent">
			<div class="admin-text">
				<p>Would you like to create an Event?</p>
				<div class="admin-icons"><a href="/events/add"><i class="fa fa-check" id="create" aria-hidden="true" style="margin-top: 18px; margin-bottom: 18px;"></i></a><i class="fa fa-times" id="close" aria-hidden="true" style="margin-top: 18px; margin-bottom: 18px;"></i></div>
			</div>
		</div>
		@endif
		@foreach($past as $event)
		<a href="./events/{{$event->id}}"><div class="eventItem" style="background-image: url(..{{$event->image_url}})">
			<div class="textCont">
				<h1>{{$event->name}}</h1>
				<h2>{{$event->location_name}}</h2>
				<h3>{{$event->date}}</h3>
			</div>
		</div></a>
		@endforeach
	</div>
</div>
@endsection