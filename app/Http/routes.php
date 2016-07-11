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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('recipe', 'RecipeController');
Route::resource('season', 'SeasonController');

Route::get('/settings', 'UserSettingController@index');
Route::post('/settings', ['as' => 'settings.store', 'use' => 'UserSettingController@update']);
