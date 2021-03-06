<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes(['register' => false]);

Route::get('/news', 'HomeController@news')->name('news');

Route::middleware(['auth', 'admin'])
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index');
        Route::get('plugins', 'DashboardController@plugins');
        Route::get('chart/users', 'ChartController@users');
        Route::get('export/users', 'ExportController@users');
        Route::resource('users', 'UserController');

    });
