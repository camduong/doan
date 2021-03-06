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
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('detailtour/{slug}', ['as' => 'tour.single', 'uses' => 'HomeController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tour', 'HomeController@tour')->name('tour');
Route::get('/tour', 'HomeController@searchTour')->name('tour.search');
Route::get('tour/{name}={slug}', ['as' => 'tour.location', 'uses' => 'HomeController@tourInLocation'])->where('slug', '[\w\d\-\_]+');
Route::get('/login','Auth\UserLoginController@showLoginForm')->name('user.login');
Route::post('login','Auth\UserLoginController@login')->name('user.login.submit');
Route::post('logout','Auth\UserLoginController@logout')->name('user.logout.submit');
Route::get('/history','HomeController@getHistory')->name('user.history');
Route::get('/shopping/{id}', 'HomeController@addShoppingCart')->name('addShoppingCart');
Route::get('/shopping-cart', 'HomeController@getCart')->name('shoppingCart');
Route::post('/update', 'HomeController@getUpdate')->name('update');
Route::post('/delete', 'HomeController@getRemoveItem')->name('removeItem');
Route::post('/deleteall', 'HomeController@getRemoveAll')->name('removeAll');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', 'HomeController@getCheckout')->name('checkout');
    Route::post('/checkout', 'HomeController@postCheckout')->name('checkout');
    Route::get('/profile', 'HomeController@getProfile')->name('user.profile');
    Route::post('/profile/{id}', 'HomeController@updateProfile')->name('updateProfile');
    Route::post('/changepass/{id}', 'HomeController@changePassword')->name('changePassword');
});
Route::group(['middleware' => 'adminrole'], function(){
    Route::prefix('admin')->group(function(){
        Route::post('logout','AdminController@logout')->name('admin.logout.submit');
        Route::get('logout','AdminController@logout')->name('admin.logout.submit');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::resource('tour', 'TourController');
        Route::resource('vehicle', 'VehicleController',['except' => ['create','show']]);
        Route::resource('hotel', 'HotelController',['except' => ['create','show']]);
        Route::resource('location', 'LocationController',['except' => ['create','show']]);
        Route::resource('region', 'RegionsController',['except' => ['create','show']]);
        Route::resource('customer', 'CustomerController',['expect' => ['create','destroy','store']]);
        Route::resource('user', 'UserController',['expect' => ['create','destroy','store']]);
    });
});


