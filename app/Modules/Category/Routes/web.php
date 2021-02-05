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

    Route::get('/category/', 'AdminCategoryController@index')->name('admin.category.list');
    Route::get('/category/new', 'AdminCategoryController@getCategoryCreate')->name('admin.category.create');
    Route::post('/category/new', 'AdminCategoryController@store')->name('admin.category.store');
    Route::get('/category/edit/{id}', 'AdminCategoryController@edit')->name('admin.category.edit');
    Route::put('/category/edit/{id}', 'AdminCategoryController@update')->name('admin.category.update');
    Route::delete('/category/{id}', 'AdminCategoryController@destroy')->name('admin.category.destroy');

});
