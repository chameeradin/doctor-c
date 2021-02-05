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

    Route::get('/inquiries/', 'AdminInquiryController@index')->name('admin.inquiry.list');
    Route::delete('/inquiries/{id}', 'AdminInquiryController@destroy')->name('admin.inquiry.destroy');

});
Route::post('/inquiries/new', 'InquiryController@store')->name('inquiry.store');
