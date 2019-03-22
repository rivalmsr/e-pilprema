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
Route::group(['middleware' => 'admin'], function () {
	Route::post('users/activeall', 'UsersController@activeall')->name('users.activeall');
	Route::post('users/store', 'UsersController@store')->name('user.store');
	Route::post('users/active/{id}', 'UsersController@active')->name('users.active');
	Route::post('users/deactive/{id}', 'UsersController@deactive')->name('users.deactive');
	Route::delete('users/{id}/delete', 'UsersController@destroy')->name('users.deletes');
});
	
Route::group(['middleware' => 'teacher'], function () {
	Route::resource('users', 'UsersController');
});