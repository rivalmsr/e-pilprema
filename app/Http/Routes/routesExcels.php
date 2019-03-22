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
Route::post('import_users', 'ExcelsController@import_users');
Route::post('import_candidates', 'ExcelsController@import_candidates');
Route::get('export_users/{graduate}', 'ExcelsController@export_users');
Route::get('export_candidates', 'ExcelsController@export_candidates')->name('e_candidates');
