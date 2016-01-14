<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['prefix' => 'admin', 'middleware' => 'checkrole'], function () {
    Route::get('', ['uses' => 'DashboardController@index', 'as' => 'admin.dashboard.index']);
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('index', ['uses' => 'DashboardController@index', 'as' => 'admin.dashboard.index']);
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('index', ['uses' => 'CategoriesController@index', 'as' => 'admin.categories.index']);
        Route::get('create', ['uses' => 'CategoriesController@create', 'as' => 'admin.categories.create']);
        Route::get('delete/{id}', ['uses' => 'CategoriesController@delete', 'as' => 'admin.categories.delete']);
        Route::get('edit/{id}', ['uses' => 'CategoriesController@edit', 'as' => 'admin.categories.edit']);

        Route::post('store', ['uses' => 'CategoriesController@store', 'as' => 'admin.categories.store']);
        Route::put('update/{id}', ['uses' => 'CategoriesController@update', 'as' => 'admin.categories.update']);

    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('index', ['uses' => 'ProductsController@index', 'as' => 'admin.products.index']);
        Route::post('index', ['uses' => 'ProductsController@index', 'as' => 'admin.products.index']);
        Route::get('create', ['uses' => 'ProductsController@create', 'as' => 'admin.products.create']);
        Route::get('delete/{id}', ['uses' => 'ProductsController@delete', 'as' => 'admin.products.delete']);
        Route::get('edit/{id}', ['uses' => 'ProductsController@edit', 'as' => 'admin.products.edit']);
        Route::get('show/{id}', ['uses' => 'ProductsController@show', 'as' => 'admin.products.show']);

        Route::post('store', ['uses' => 'ProductsController@store', 'as' => 'admin.products.store']);
        Route::put('update/{id}', ['uses' => 'ProductsController@update', 'as' => 'admin.products.update']);

    });
    Route::group(['prefix' => 'clients'], function () {
        Route::get('index', ['uses' => 'ClientsController@index', 'as' => 'admin.clients.index']);
        Route::get('create', ['uses' => 'ClientsController@create', 'as' => 'admin.clients.create']);
        Route::get('delete/{id}', ['uses' => 'ClientsController@delete', 'as' => 'admin.clients.delete']);
        Route::get('edit/{id}', ['uses' => 'ClientsController@edit', 'as' => 'admin.clients.edit']);
        Route::get('show/{id}', ['uses' => 'ClientsController@show', 'as' => 'admin.clients.show']);

        Route::post('store', ['uses' => 'ClientsController@store', 'as' => 'admin.clients.store']);
        Route::put('update/{id}', ['uses' => 'ClientsController@update', 'as' => 'admin.clients.update']);
    });


});
