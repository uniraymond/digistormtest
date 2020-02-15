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

Route::get('/user/{id}', 'UsersController@show');
Route::get('/user', 'UsersController@list');
Route::get('/user/{id}/edit', 'UsersController@edit');
Route::patch('/user/{id}', 'UsersController@update');
Route::get('/user/{id}/info', 'UsersController@info')->name('user.info');

Route::redirect('/', '/login');

Auth::routes();

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::group(['middleware' => ['auth', 'twofactor']], function() {


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('user/{userid}/')->group(function() {

        // profile
        Route::get('profile', 'ProfilesController@index');
        Route::get('profile/show', 'ProfilesController@show');
        Route::get('profile/edit', 'ProfilesController@edit');
        Route::post('profile', 'ProfilesController@store');
        Route::patch('profile', 'ProfilesController@updateUserprofile');
//        Route::patch('/profile/{profile}', 'ProfilesController@update');
        Route::delete('profile/{profile}', 'ProfilesController@destroy');

        // phone
        Route::get('phone', 'PhonesController@index');
        Route::get('phone/create', 'PhonesController@create');
        Route::post('phone', 'PhonesController@store');

        Route::patch('phone/{phone}', 'PhonesController@update');
        Route::delete('phone/{phone}', 'PhonesController@destroy');

        // address
        Route::get('address', 'AddressesController@index');
        Route::get('address/create', 'AddressesController@create');
        Route::post('address', 'AddressesController@store');

        Route::patch('address/{address}', 'AddressesController@update');
        Route::delete('address/{address}', 'AddressesController@destroy');

    });
});


