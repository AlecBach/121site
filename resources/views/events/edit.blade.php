@extends('master')

@section('title', 'Edit \''.$event->name.'\'')
@section('pageID', 'editEvent')

@section('css')
    <link rel="stylesheet" href="{{  URL::asset('css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css">
@endsection

@section('js')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKVHnSfHjQBAYQ9kNDH2d2wBU5Z4wequs&libraries=places&callback=initMap"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
@endsection

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit '{{$event->name}}'</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/events/update/{{$event->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{-- name  date  description  location_name  location_id  image_url  images_array  video_url   price   ticket_url  
 --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{$event->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-2 control-label">Date</label>

                            <div class="col-md-10">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' name="date" id="date" class="form-control" />
                                    <input type="text" id="currentDate" style="display: none;" value="{{$event->date}}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <span class="help-block">
                                    Set the time and date for the event.
                                </span>
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripton') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                                <textarea id="description" name="description" style="display: none;" required>{{$event->description}}</textarea>
                                <div id="descriptionApp"></div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-2 control-label">Location</label>

                            <div class="col-md-10">
                                <input id="locationSearch" type="text" name="locationSearch" value="{{$event->location_name}}" class="form-control">
                                <input id="location" type="text" class="form-control" name="location" style="display: none;" required>
                                <div id="mapLocation" style="display: none;">{{$event->location_id}}</div>
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-10 col-md-offset-2">
                                <div id="mapCont" style="margin-top: 10px;">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-2 control-label">Main Image</label>

                            <div class="col-md-10">
                                <input id="image" type="file" name="image">
                                <span class="help-block">
                                    Upload an image to be displayed as the main image.
                                </span>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Current Image</label>

                            <div class="col-md-10">
                                <img class="currentImg" src="{{$event->image_url}}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imageArray') ? ' has-error' : '' }}">
                            <label for="imageArray" class="col-md-2 control-label">Gallery Images</label>

                            <div class="col-md-10">
                                <input id="imageArray" type="file" name="images[]" multiple>
                                <span class="help-block">
                                    Optional: upload multiple images to be displayed in a gallery for the event.
                                </span>
                                @if ($errors->has('imageArray'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imageArray') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($event->images_array)
                        <div class="form-group">
                            <label for="imageArray" class="col-md-2 control-label">Current Gallery</label>

                            <div class="col-md-10">
                                <!--
                                @php
                                $i = 0
                                @endphp
                                @foreach($event->images_array as $image)
                                --><div class="galleryItemPrvw" id="img{{$i}}">
                                    <img class="galleryImgPrvw" src="{{$image}}">
                                    <div class="deleteGallBtn" id="{{$i}}">X<div style="display: none;" class="deleteGallConfirm"> Confirm?</div></div>
                                    <div class="imageNumber" style="display: none;">{{$i}}</div>
                                </div><!--
                                @php
                                $i++
                                @endphp
                                @endforeach
                                --><input type="text" name="galleryImagesList" id="galleryImagesList" style="display: none;">
                            </div>
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                            <label for="video" class="col-md-2 control-label">Video Links</label>

                            <div class="col-md-10">
                                <input id="video" type="text" class="form-control"@if($event->video_url) value="{{$event->video_url}}"@endif name="video">
                                <span class="help-block">
                                    Optional: Seperate URLs with a comma then an Exclamation mark. (,!) eg: "http://link/video?1/<strong><span>,!</span></strong>http://link/video?2/"
                                </span>
                                @if ($errors->has('video'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-2 control-label">Price</label>

                            <div class="col-md-10">
                                <input id="price" type="text" class="form-control"@if($event->price) value="{{$event->price}}"@endif name="price">
                                <span class="help-block">
                                    Optional: Add a price for event tickets. Do not add a dollar sign. eg: 39.99
                                </span>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tickets') ? ' has-error' : '' }}">
                            <label for="tickets" class="col-md-2 control-label">Ticket shop URL</label>

                            <div class="col-md-10">
                                <input id="tickets" type="text" class="form-control"@if($event->ticket_url) value="{{$event->ticket_url}}"@endif name="tickets">
                                <span class="help-block">
                                    Optional: Add a link to a ticketing site.
                                </span>
                                @if ($errors->has('tickets'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tickets') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection