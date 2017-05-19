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

use Illuminate\Support\Facades\Auth;




Route::get('/', 'IndexController@index');

Route::get('/upcoming', 'EventsController@upcoming');

Route::get('/past', 'EventsController@past');

Route::post('/events/store', 'EventsController@store');

Route::get('/events/add', 'EventsController@create');

Route::get('/events/{event}', 'EventsController@show');

Route::get('/events/delete/{event}', 'EventsController@destroy');

Route::get('/events/edit/{event}', 'EventsController@edit');

Route::post('/events/update/{event}', 'EventsController@update');

Route::post('/contact', 'contact@send');

Route::get('/artists', 'ArtistsController@index');

Route::post('/artists/store', 'ArtistsController@store');

Route::get('/artists/add', 'ArtistsController@create');

Route::get('/artists/edit/{artist}', 'ArtistsController@edit');

Route::post('/artists/update/{artist}', 'ArtistsController@update');

Route::get('/artists/delete/{artist}', 'ArtistsController@destroy');

Route::get('/artists/{artist}', 'ArtistsController@show');

Route::get('/login', 'HomeController@index');

Route::get('/logout', function(){

	Auth::logout();
	return redirect('/');

});

Route::get('/home', function(){ return redirect('/'); });

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

