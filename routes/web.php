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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfilesController@index');
Route::post('/profile', 'ProfilesController@store');
Route::patch('/profile/{profile}', 'ProfilesController@update');
Route::delete('/profile/{profile}', 'ProfilesController@destroy');

Route::get('/phone', 'PhonesController@index');
Route::post('/phone', 'PhonesController@store');
Route::patch('/phone/{phone}', 'PhonesController@update');
Route::delete('/phone/{phone}', 'PhonesController@destroy');

