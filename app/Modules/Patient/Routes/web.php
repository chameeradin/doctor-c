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

Route::group(['middleware' => ['auth','role:Administrator|Patient'], 'prefix' => 'dashboard'],  function () {

    Route::get('/patients/', 'AdminPatientController@index')->name('admin.patient.list');
    Route::get('/patient/new', 'AdminPatientController@getPatientCreate')->name('admin.patient.create');
    Route::post('/patient/new', 'AdminPatientController@store')->name('admin.patient.store');
    Route::get('/patient/edit/{id}', 'AdminPatientController@edit')->name('admin.patient.edit');
    Route::put('/patient/edit/{id}', 'AdminPatientController@update')->name('admin.patient.update');
    Route::delete('/patient/{id}', 'AdminPatientController@destroy')->name('admin.patient.destroy');

});
