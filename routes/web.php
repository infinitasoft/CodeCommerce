<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/','Admin\ProductImagesController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/',['as'=>'admin.categories.index','uses'=>'Admin\CategoriesController@index']);
        Route::get('create',['as'=>'admin.categories.create','uses'=>'Admin\CategoriesController@create']);
        Route::post('store',['as'=>'admin.categories.store','uses'=>'Admin\CategoriesController@store']);
        Route::get('{id}',['as'=>'admin.categories.show','uses'=>'Admin\CategoriesController@show']);
        Route::get('edit/{id}',['as'=>'admin.categories.edit','uses'=>'Admin\CategoriesController@edit']);
        Route::put('update/{id}',['as'=>'admin.categories.update','uses'=>'Admin\CategoriesController@update']);
        Route::get('delete/{id}',['as'=>'admin.categories.delete','uses'=>'Admin\CategoriesController@delete']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/',['as'=>'admin.products.index','uses'=>'Admin\ProductsController@index']);
        Route::get('create',['as'=>'admin.products.create','uses'=>'Admin\ProductsController@create']);
        Route::post('store',['as'=>'admin.products.store','uses'=>'Admin\ProductsController@store']);
        Route::get('edit/{id}',['as'=>'admin.products.edit','uses'=>'Admin\ProductsController@edit']);
        Route::put('update/{id}',['as'=>'admin.products.update','uses'=>'Admin\ProductsController@update']);
        Route::get('delete/{id}',['as'=>'admin.products.delete','uses'=>'Admin\ProductsController@delete']);
    });
    Route::group(['prefix' => 'images'], function () {
        Route::get('/',['as'=>'admin.images.index','uses'=>'Admin\ProductImagesController@index']);
        Route::get('create',['as'=>'admin.images.create','uses'=>'Admin\ProductImagesController@create']);
        Route::post('store',['as'=>'admin.images.store','uses'=>'Admin\ProductImagesController@store']);
        Route::get('delete/{id}',['as'=>'admin.images.delete','uses'=>'Admin\ProductImagesController@delete']);
    });

});
