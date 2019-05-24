<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/news', 'HomeController@news')->name('news');

Route::middleware(['auth', 'admin'])
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index');
        Route::get('plugins', 'DashboardController@plugins');
        Route::get('chart/users', 'ChartController@users');
        Route::get('chart/sold', 'ChartController@sold');
        Route::get('export/users', 'ExportController@users');
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController', ['except' => ['show']]);
        Route::resource('foods', 'FoodController', ['except' => ['show']]);
        // Route::resource('actions', 'ActionController');
        Route::get('category/{cid}/foods', 'FoodController@byCid');
        Route::get('orders', 'OrderController@index');
        Route::delete('orders/{order}', 'OrderController@destroy');
        Route::get('info', 'AdminController@show');
        Route::post('info', 'AdminController@update');

    });
