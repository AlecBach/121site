<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Artist;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all artists

        $artists = Artist::all();

        return view('artists', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {

            return view('artists.create');

        }else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('/');
        }
        
        $artist = new Artist;

        $artist->name = request('name');
        $artist->genre = request('genre');
        $artist->hometown = request('hometown');
        $artist->description = request('description');

        //Process Image
        $img = Image::make(request('image'))->fit(500);
        $imgName = "/imgs/artists/".uniqid().".jpg";
        $img->save(public_path().$imgName);

        $artist->image_url = $imgName;

        $artist->save();
        
        return redirect('artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!is_numeric($id)){
            return redirect('/artists');
        }
        $artist = Artist::find($id);
        
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()){
            return redirect('/');
        }
        $artist = Artist::find($id);

        return view('artists.edit', compact('artist'));
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
        if(!Auth::check()){
            return redirect('/');
        }
        $artist = Artist::find($id);

        $artist->name = request('name');
        $artist->genre = request('genre');
        $artist->hometown = request('hometown');
        $artist->description = request('description');

        //Process Image
        if (request('image')) {
            $img = Image::make(request('image'))->fit(500);
            $imgName = "/imgs/artists/".uniqid().".jpg";
            $img->save(public_path().$imgName);

            $artist->image_url = $imgName;
        }
        

        $artist->save();

        return redirect('artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return redirect('/');
        }
        $artist = Artist::find($id);

        $artist->delete();

        return redirect('artists');
    }
}
