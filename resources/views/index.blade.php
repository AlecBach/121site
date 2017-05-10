@extends('master')

@section('title', 'Home')
@section('pageID', 'home')

@section('js')
@endsection

@section('css')
@endsection

@section('content')

    <div class="fullV" id="homeHero">
    	<div id="homeHeroText">
    		<div class="center">
    			<h2>New zealand's own underground rave scene.</h2>
    		</div>
       	</div>
		<div id="slider-container">
			<div class="images"><ul>
				<li style="background-image: url({{  URL::asset('wowslide/data1/images/13909231_1724783341116074_5132317581033830177_o.jpg') }});"></li>{{-- 
				 --}}<li style="background-image: url({{  URL::asset('wowslide/data1/images/14257513_1736499923277749_1234639891540634355_o.jpg') }});"></li>{{-- 
				 --}}<li style="background-image: url({{  URL::asset('wowslide/data1/images/14681716_1753779438216464_4907942710607315810_n.jpg') }});"></li>{{-- 
				 --}}<li style="background-image: url({{  URL::asset('wowslide/data1/images/17807555_1834497916811282_1233064804543087988_o.jpg') }});"></li>{{-- 
				 --}}<li style="background-image: url({{  URL::asset('wowslide/data1/images/17880561_1834499640144443_4225335625462022738_o.jpg') }});"></li>{{-- 
				  --}}<li style="background-image: url({{  URL::asset('wowslide/data1/images/13909231_1724783341116074_5132317581033830177_o.jpg') }});"></li>
			</ul></div>
		</div>
    </div>
    <div id="homeSection2">
        <div class="center">
            <h2>121 IS PARTY CULTURE</h2>
            <div class="yellowHr" id="hr1"></div>
            <p>121 organises rave and rock parties around Wellington city, filling the demand for a new nightlife. Check out our past events and artists to get an idea of what you can expect from our upcoming bangers. </p>
            <div class="icons">
            	<a href="/upcoming"><div class="item">
            		<div class="icon" id="ticket"></div>
            		<div class="title">Upcoming Events</div>
            		<div class="desc">Get ready for our upcoming events with location, date, pricing, tickets and more.</div>
            	</div></a>{{-- 
            	 --}}<a href="/past"><div class="item">
            		<div class="icon" id="hand"></div>
            		<div class="title">Past Events</div>
            		<div class="desc">Check out everything from our past events! Get hyped for our next by looking at the galleries or videos.</div>
            	</div></a>{{-- 
            	 --}}<a href="/artists"><div class="item">
            		<div class="icon" id="mic"></div>
            		<div class="title">Artists</div>
            		<div class="desc">View all of our talented artists, from lacked rock to hard trap, we will keep you entertained.</div>
            	</div></a>
            </div>
        </div>
    </div>

@endsection