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

Route::group(['middleware' => ['auth', 'role:Administrator|Doctor'], 'prefix' => 'dashboard'],  function () {

    Route::get('/records/', 'AdminRecordController@index')->name('admin.record.list');
    Route::get('/records/new', 'AdminRecordController@getRecordCreate')->name('admin.record.create');
    Route::post('/records/new', 'AdminRecordController@store')->name('admin.record.store');
    Route::get('/records/edit/{id}', 'AdminRecordController@edit')->name('admin.record.edit');
    Route::put('/records/edit/{id}', 'AdminRecordController@update')->name('admin.record.update');
    Route::delete('/records/{id}', 'AdminRecordController@destroy')->name('admin.record.destroy');

});
