<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'back'], function () {
	Route::get('/','UsersController@home')->name('home');
	Route::get('quick_count', 'UsersController@quick_count');
	Route::get('show_candidate/{id}', 'UsersController@show_candidate');


});
Route::get('quick','UsersController@home')->name('home');

Route::get('logout', 'AuthenticateController@logout');
Route::get('expired', 'AuthenticateController@expired');

Route::group(['middleware' => 'teacher'], function () {
	Route::get('dashboard','VotingController@indexDashboard');
});