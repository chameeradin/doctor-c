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

    Route::get('/doctors/', 'AdminDoctorController@index')->name('admin.doctor.list');
    Route::get('/doctor/new', 'AdminDoctorController@getDoctorCreate')->name('admin.doctor.create');
    Route::post('/doctor/new', 'AdminDoctorController@store')->name('admin.doctor.store');
    Route::get('/doctor/edit/{id}', 'AdminDoctorController@edit')->name('admin.doctor.edit');
    Route::put('/doctor/edit/{id}', 'AdminDoctorController@update')->name('admin.doctor.update');
    Route::delete('/doctor/{id}', 'AdminDoctorController@destroy')->name('admin.doctor.destroy');

});


