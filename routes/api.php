<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::namespace('Api')->group(function () {
	Route::namespace('Auth')->group(function () {
		Route::post('login', 'LoginController@login');
	});
	// Route::apiResource('users', 'UserController');

	Route::middleware(['auth:api', 'refresh'])->get('/user', function (Request $request) {
	    return $request->user();
	});

	Route::get('categories', 'CategoryController@index');
	Route::get('foods', 'FoodController@index');

});
