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
	Route::resource('candidates', 'CandidatesController');
	Route::get('officialreport', 'ReportController@officialReport')->name('officialreport');
});