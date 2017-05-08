<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { return view('index'); });

// Route::get('/upcoming', function () { return view('index'); });

// Route::get('/past', function () { return view('index'); });

// Route::get('/artists', function () { return view('index'); });
use Illuminate\Support\Facades\Auth;




Route::get('/', 'IndexController@index');

Route::get('/upcoming', 'EventsController@upcoming');

Route::get('/past', 'EventsController@past');

Route::post('/events/store', 'EventsController@store');

Route::get('/events/add', 'EventsController@create');

Route::get('/events/{event}', 'EventsController@show');

Route::get('/events/delete/{event}', 'EventsController@destroy');

Route::get('/artists', 'ArtistsController@index');

Route::post('/artists/store', 'ArtistsController@store');

Route::get('/artists/add', 'ArtistsController@create');

Route::get('/artists/edit/{artist}', 'ArtistsController@edit');

Route::post('/artists/update/{artist}', 'ArtistsController@update');

Route::get('/artists/delete/{artist}', 'ArtistsController@destroy');

Route::get('/artists/{artist}', 'ArtistsController@show');

// Route::get('/artists', function(){

// 	$artists = App\Artist::all();

// 	return view('artists', compact('artists'));

// });

// Route::get('/artists/add', function(){

// 	if (Auth::check()) {

// 		return view('addArtist');

// 	}else{
// 		return redirect('/');
// 	}


// });

Route::get('/login', 'HomeController@index');

Route::get('/logout', function(){

	Auth::logout();
	return redirect('/');

});

Route::get('/home', function(){ return redirect('/'); });

Auth::routes();

