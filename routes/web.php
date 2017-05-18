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
Route::get('/tour', 'HomeController@tour')->name('tour');
Route::get('/login','Auth\UserLoginController@showLoginForm')->name('user.login');
Route::post('login','Auth\UserLoginController@login')->name('user.login.submit');
Route::post('logout','Auth\UserLoginController@logout')->name('user.logout.submit');
Route::get('/shopping/{id}', 'HomeController@addShoppingCart')->name('addShoppingCart');
Route::get('/shopping-cart', 'HomeController@getCart')->name('shoppingCart');
Route::get('/add/{id}', 'HomeController@getAddByOne')->name('addByOne');
Route::get('/reduce/{id}', 'HomeController@getReduceByOne')->name('reduceByOne');
Route::get('/remove/{id}', 'HomeController@getRemoveItem')->name('removeItem');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', 'HomeController@getCheckout')->name('checkout');
    Route::post('/checkout', 'HomeController@postCheckout')->name('checkout');
});
Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout','Auth\AdminLoginController@logout')->name('admin.logout.submit');
    Route::get('logout','Auth\AdminLoginController@logout')->name('admin.logout.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('tour', 'TourController');
    Route::resource('vehicle', 'VehicleController',['except' => ['create','show']]);
    Route::resource('hotel', 'HotelController',['except' => ['create','show']]);
    Route::resource('location', 'LocationController',['except' => ['create','show']]);
    Route::resource('customer', 'CustomerController',['only' => ['index','show']]);
});

