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

Route::get('/user/{$userId}', 'UsersController@show');

Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/', '/login');

Auth::routes();

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::group(['middleware' => ['auth', 'twofactor']], function() {

    // user
    Route::get('/', 'UsersController@index');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    // profile
    Route::get('/profile', 'ProfilesController@index');
    Route::post('/profile', 'ProfilesController@store');
    Route::patch('/profile/{profile}', 'ProfilesController@update');
    Route::delete('/profile/{profile}', 'ProfilesController@destroy');

    // phone
    Route::get('/phone', 'PhonesController@index');
    Route::post('/phone', 'PhonesController@store');
    Route::patch('/phone/{phone}', 'PhonesController@update');
    Route::delete('/phone/{phone}', 'PhonesController@destroy');

    // address
    Route::get('/address', 'AddressesController@index');
    Route::post('/address', 'AddressesController@store');
    Route::patch('/address/{address}', 'AddressesController@update');
    Route::delete('/address/{address}', 'AddressesController@destroy');
});


