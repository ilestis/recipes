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
    if (Auth::guest()) {
        return view('welcome');
    } else {
        return redirect('home');
    }
});

Route::auth();

Route::get('home', 'PlanningController@index');
Route::get('generate', 'PlanningController@generate');
Route::get('history', 'PlanningController@history');

Route::resource('recipe', 'RecipeCrudController');
Route::resource('season', 'SeasonCrudController');
Route::resource('planning', 'PlanningCrudController');

Route::get('settings', 'UserSettingController@index');
Route::post('settings', 'UserSettingController@update')->name('settings.store');