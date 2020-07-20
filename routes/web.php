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

Route::group(['middleware' => 'guest'], function () {
   // Route::get('/', 'Auth\LoginController@showLoginForm')->name('/');
    Route::any('login', 'Auth\LoginController@login');
    Route::get('/', 'ProductController@showLandingProducts')->name('product.landing');
});

Auth::routes();

/***Login All Users****/
Route::group(['middleware' => ['CheckRol:Admin,Customer']], function () {
    Route::post('product/{id}/add_to_card', 'ProductController@addToCard')->name('product.addToCard');
    Route::any('logout', 'Auth\LoginController@logout');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('cart', 'PurchaseController@index')->name('cart.index');
    Route::get('cart/{id}/delete','PurchaseController@destroy')->name('cart.destroy');
    Route::get('cart/{id}/purchase', 'PurchaseController@processPurchase')->name('cart.processPurchase');
    Route::post('cart', 'PurchaseController@sendProduct')->name('cart.sendProduct');
    Route::get('/product_list', 'ProductController@showLandingProducts')->name('product_list');
    Route::get('product/{id}/show', 'ProductController@show')->name('product.show');
    Route::get('email', 'PurchaseController@sendMail')->name('senMail');
    Route::get('homeDashboard', 'HomeController@Dashboard')->name('home.dashboard');
});

/*** Admin Routes ***/
Route::group(['middleware' => ['CheckRol:Admin']], function () {
    Route::get('product', 'ProductController@index')->name('product.index');
    Route::get('product/create','ProductController@create')->name('product.create');
    Route::post('product', 'ProductController@store')->name('product.store');
    Route::get('product/{id}/edit','ProductController@edit')->name('product.edit');
    Route::patch('product/{id}/update','ProductController@update')->name('product.update');
    Route::get('product/{id}/delete','ProductController@destroy')->name('product.destroy');

});


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users','UserController@index');
    Route::get('users/{user}','UserController@show');
    Route::patch('users/{user}','UserController@update');
});
