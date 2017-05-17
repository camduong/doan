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

Auth::routes();
Route::get('tour/{slug}', ['as' => 'tour.single', 'uses' => 'HomeController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tour', 'HomeController@tour');
Route::get('/login','Auth\UserLoginController@showLoginForm')->name('user.login');
Route::post('login','Auth\UserLoginController@login')->name('user.login.submit');
Route::post('logout','Auth\UserLoginController@logout')->name('user.logout.submit');
Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout','Auth\AdminLoginController@logout')->name('admin.logout.submit');
    Route::get('logout','Auth\AdminLoginController@logout')->name('admin.logout.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('tour', 'TourController');
    Route::resource('vehicle', 'VehicleController',['except' => 'create']);
    Route::resource('hotel', 'HotelController',['except' => 'create']);
    Route::resource('location', 'LocationController',['except' => 'create']);
});

