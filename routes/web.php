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
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
	->namespace('Admin')
	->prefix('admin')
	->group(function () {
		Route::get('/', 'DashboardController@index');
		Route::get('plugins', 'DashboardController@plugins');
		Route::get('users/export', 'UserController@export');
		Route::resource('users', 'UserController');
	});
