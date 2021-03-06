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
Route::get('/','Store\StoreController@index');
Route::get('category/{id}',['as'=>'store.categories.show','uses'=>'Store\CategoriesController@show']);
Route::get('produto/{id}',['as'=>'store.products.show','uses'=>'Store\ProductsController@show']);
Route::get('tag/{id}',['as'=>'store.products.tag.show','uses'=>'Store\ProductsController@tagShow']);
Route::get('cart',['as'=>'store.cart','uses'=>'Store\CartController@index']);
Route::get('cart/add/{id}',['as'=>'store.cart.add','uses'=>'Store\CartController@add']);
Route::get('cart/mais/{id}',['as'=>'store.cart.mais','uses'=>'Store\CartController@add']);
Route::get('cart/menos/{id}',['as'=>'store.cart.menos','uses'=>'Store\CartController@removeOne']);
Route::get('cart/destroy/{id}',['as'=>'store.cart.delete','uses'=>'Store\CartController@destroy']);
Route::get('checkout/placeOrder',['as'=>'store.chechout.place','uses'=>'Store\CheckoutController@place']);

Route::group(['prefix' => 'admin','middleware'=>'is_admin'], function () {
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

Auth::routes();

Route::get('/home', 'HomeController@index');
