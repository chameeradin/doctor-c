<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => ['auth', 'role:Administrator'], 'prefix' => 'dashboard'],  function () {
    Route::get('/users/', 'UserController@index')->name('admin.user.list');
    Route::get('/users/new', 'UserController@getUserCreate')->name('admin.user.create');
    Route::post('/users/new', 'UserController@store')->name('admin.user.store');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('admin.user.edit');
    Route::put('/users/edit/{id}', 'UserController@update')->name('admin.user.update');
    Route::delete('/users/{id}', 'UserController@destroy')->name('admin.user.destroy');

    Route::get('user-details/{id}', 'UserController@userDetails')->name('user.details');
});
Route::group(['prefix' => 'dashboard'],  function ()
{
    Route::get('my-account', 'MyProfileController@myProfile')->middleware('auth')->name('profile');
    Route::get('my-account/change-password', 'MyProfileController@passwordChange')->middleware('auth')->name('change.password');
    Route::get('my-account/change-email', 'MyProfileController@emailChange')->middleware('auth')->name('change.email');
    Route::put('my-account', 'MyProfileController@profileUpdate')->middleware('auth')->name('profile.update');
    Route::put('my-account/change-password', 'MyProfileController@passwordUpdate')->middleware('auth')->name('password.update');
    Route::put('my-account/change-email', 'MyProfileController@emailUpdate')->middleware('auth')->name('email.update');
});