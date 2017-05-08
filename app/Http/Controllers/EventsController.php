<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Size;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upcoming()
    {
        $allEvents = Event::all();
        date_default_timezone_set('Pacific/Auckland');
        //Filter events with isFuture();
        $upcoming = [];

        //Push events in future to array.
        foreach ($allEvents as $event) {
            $event->date = Carbon::parse($event->date);
            if($event->date->isFuture()){
                array_push($upcoming, $event);
            }
        }
        //Sort events by date.
        $array_size = count($upcoming);
        for($i = 0; $i < $array_size; $i ++) {
            for($j = 0; $j < $array_size; $j ++) {
                if ($upcoming[$i]->date->lt($upcoming[$j]->date)) {
                    $tem = $upcoming[$i];
                    $upcoming[$i] = $upcoming[$j];
                    $upcoming[$j] = $tem;
                }
            }
        };
        
        //Format date to readable.
        foreach ($upcoming as $key => $value) {
            $value->date = $value->date->toDayDateTimeString();
        };
        
        // Array containing only sorted upcoming events! woop woop.

        return view('events.upcoming', compact('upcoming'));
    }

    public function past()
    {
        $allEvents = Event::all();
        date_default_timezone_set('Pacific/Auckland');
        //Filter events with isFuture();
        $past = [];

        //Push events in future to array.
        foreach ($allEvents as $event) {
            $event->date = Carbon::parse($event->date);
            if($event->date->isPast()){
                array_push($past, $event);
            }
        }
        //Sort events by date.
        $array_size = count($past);
        for($i = 0; $i < $array_size; $i ++) {
            for($j = 0; $j < $array_size; $j ++) {
                if ($past[$j]->date->lt($past[$i]->date)) {
                    $tem = $past[$i];
                    $past[$i] = $past[$j];
                    $past[$j] = $tem;
                }
            }
        };
        
        //Format date to readable.
        foreach ($past as $key => $value) {
            $value->date = $value->date->toDayDateTimeString();
        };
        
        // Array containing only sorted past events! woop woop.

        return view('events.past', compact('past'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump(request('name'));
        // echo "<br>";
        // var_dump(request('date'));
        // echo "<br>";
        // var_dump(request('description'));
        // echo "<br>";
        // var_dump(request('location'));
        // echo "<br>";
        // var_dump(request('locationSearch'));
        // echo "<br>";
        // var_dump(request('image'));
        // echo "<br>";
        // var_dump(request('images'));
        // echo "<br>";
        // var_dump(request('video'));
        // echo "<br>";
        // var_dump(request('price'));
        // echo "<br>";
        // var_dump(request('tickets'));
        // echo "<br>";

        $Event = new Event;

        $Event->name = request('name');

        // $carbonDate Carbon::createFromFormat('m/d/Y H:M', '05/31/2017 10:53 PM')->toDateTimeString()
        $carbonDate = Carbon::parse(request('date'));
        $Event->date = $carbonDate;

        $Event->description = request('description');

        $Event->location_name = request('locationSearch');

        $Event->location_id = request('location');

        
        
        $img = Image::make(request('image'));
        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $imgName = "/imgs/events/".uniqid().".jpg";
        $img->save(public_path().$imgName);
        
        $Event->image_url = $imgName;

        $images = "";
        if (request('images')) {
            foreach (request('images') as $image) {
                // var_dump($image);

                $img = Image::make($image);
                $img->resize(2000, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $imgName = "/imgs/events/gallery/".uniqid().".jpg";
                $img->save(public_path().$imgName);

                $images = $images.$imgName.",!";
            };
        }
        $images = substr($images, 0, -2);
        
        $Event->images_array = $images;

        $videos = explode(',!', request('video'));
        $videosArray = "";
        foreach ($videos as $video) {
            
            $videosArray = $videosArray.$video.",!";
        };
        $videosArray = substr($videosArray, 0, -2);

        $Event->video_url = $videosArray;

        $Event->price = request('price');

        $Event->ticket_url = request('tickets');

        $Event->save();

        return redirect('upcoming');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $event = Event::find($id);
   
        $event->date = Carbon::parse($event->date);
        if($event->date->isFuture()){
            $event->tense = "upcoming";
        }else{
            $event->tense = "past";
        }

        $event->date = $event->date->toDayDateTimeString();

        // $record->html = substr($record->html, 0, 1);
        // $record->html = substr($record->html, 0, -1);
        if($event->images_array){
            $imagesArray = array();
            if(str_contains($event->images_array, ",!")){
                $imagesArray = explode(",!", $event->images_array);
            }else{
                array_push($imagesArray, $event->images_array);
            }
            $event->images_array = $imagesArray;
        }
        if($event->video_url){
            $videoArray = array();
            if(str_contains($event->video_url, ",!")){
                $videoArray = explode(",!", $event->video_url);
            }else{
                array_push($videoArray, $event->video_url);
            }
            $event->video_url = $videoArray;
        }

        // var_dump($value);
        // echo "<br>---<br>";

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        if($event->images_array){
            $imagesArray = array();
            if(str_contains($event->images_array, ",!")){
                $imagesArray = explode(",!", $event->images_array);
            }else{
                array_push($imagesArray, $event->images_array);
            }
            $event->images_array = $imagesArray;
        }

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Event = Event::find($id);

        $Event->name = request('name');

        // $carbonDate Carbon::createFromFormat('m/d/Y H:M', '05/31/2017 10:53 PM')->toDateTimeString()
        $carbonDate = Carbon::parse(request('date'));
        $Event->date = $carbonDate;

        $Event->description = request('description');

        $Event->location_name = request('locationSearch');

        $Event->location_id = request('location');
        
        if(request('image')){
            $img = Image::make(request('image'));
            $img->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imgName = "/imgs/events/".uniqid().".jpg";
            $img->save(public_path().$imgName);
            
            $Event->image_url = $imgName;
        }

        $images = "";
        if (request('images')) {
            foreach (request('images') as $image) {
                // var_dump($image);

                $img = Image::make($image);
                $img->resize(2000, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $imgName = "/imgs/events/gallery/".uniqid().".jpg";
                $img->save(public_path().$imgName);

                $images = $images.$imgName.",!";
            };
        }

        if($Event->images_array){
            $imagesArray = array();
            if(str_contains($Event->images_array, ",!")){
                $imagesArray = explode(",!", $Event->images_array);
            }else{
                array_push($imagesArray, $Event->images_array);
            }
            $Event->images_array = $imagesArray;
        };
        if(request('galleryImagesList') !== NULL){
            $galleryImages = request('galleryImagesList');
            $galleryImages = substr($galleryImages, 0, -1);
            $galleryArray = explode(",", $galleryImages);
            foreach ($galleryArray as $value) {
                //Each image that has not been deleted is added on to the string/array..
                $images = $images.$Event->images_array[$value].",!";
            }
        };
        $images = substr($images, 0, -2);

        $Event->images_array = $images;

        $videos = explode(',!', request('video'));
        $videosArray = "";
        foreach ($videos as $video) {
            
            $videosArray = $videosArray.$video.",!";
        };
        $videosArray = substr($videosArray, 0, -2);

        $Event->video_url = $videosArray;

        $Event->price = request('price');

        $Event->ticket_url = request('tickets');

        $Event->save();

        return redirect('upcoming');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        date_default_timezone_set('Pacific/Auckland');

        $event->date = Carbon::parse($event->date);
        if($event->date->isPast()){
            $event->tense = 'past';
        }else{
            $event->tense = 'upcoming';
        }

        $event->delete();

        return redirect($event->tense);
    }
}
