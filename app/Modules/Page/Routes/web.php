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

Route::resource('page', 'PageController');

Route::get('about-us', 'PageController@aboutUs')->name('aboutUs');
Route::get('contact-us', 'PageController@contactUs')->name('contactUs');
Route::get('our-doctors', 'PageController@doctors')->name('doctors');
Route::get('our-departments', 'PageController@departments')->name('departments');
Route::get('make-appointments', 'PageController@appointment')->name('makeAppointment');
