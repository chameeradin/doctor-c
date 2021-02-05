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

    Route::get('prescription/list', 'AdminPrescriptionController@index')->name('admin.prescription.list');
    Route::get('prescription/new', 'AdminPrescriptionController@getPrescriptionCreate')->name('admin.prescription.new');

    Route::post('prescription/list', 'AdminPrescriptionController@store')->name('admin.prescription.store');

    });
