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


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],  function () {

    Route::get('appointments-list', 'AppointmentsController@index')->name('appointments.list');
    Route::get('appointment/new', 'AppointmentsController@getAppointmentCreate')->name('appointments.create');

    Route::post('appointments-list', 'AppointmentsController@store')->name('appointments.store');
    Route::delete('appointments/{id}', 'AppointmentsController@destroy')->name('appointments.destroy');
});

Route::get('doctor-records/{id}/{date}', 'AppointmentsController@getRecordsByDoctorId');
Route::get('download-appointment-pdf/{id}', 'AppointmentsController@downloadAppointmentPDF')->middleware('auth')->name('download.appointment');
Route::get('doctor-according-to-date/{date}', 'AppointmentsController@getDoctorByDate');

