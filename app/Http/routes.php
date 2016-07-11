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
Route::get('/generate', 'HomeController@generate');

Route::resource('recipe', 'RecipeController');
Route::resource('season', 'SeasonController');
Route::resource('planning', 'PlanningController');

Route::get('settings', 'UserSettingController@index');
Route::post('settings', 'UserSettingController@update')->name('settings.store');