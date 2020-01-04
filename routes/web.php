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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/admin');

Route::namespace('\App\Wx')->prefix('wx')->group(function() {
    Route::any('server', 'ServerController@index');
    Route::any('blogs-today', 'ServerController@blogsToday');
    
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user.default'); // 拿到授权用户资料

        dd($user);
    });
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
        Route::resource('articles', 'ArticleController');
    });
