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

Route::get('/',[
		'uses' => 'HomeController@getHome',
		'as' => 'home.home',
]);
Route::get('/burgers', [
		'uses' => 'ProductController@getIndex',
		'as' => 'product.index',
	]);

Route::get('/add-to-cart/{id}', [
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addtocart',
	]);


Route::get('/reduce/{id}', [
		'uses' => 'ProductController@getReduceByOne',
		'as' => 'product.reducebyone',
	]);

Route::get('/remove/{id}', [
		'uses' => 'ProductController@getRemoveItem',
		'as' => 'product.remove',
	]);

Route::get('/shoppingcart', [
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingcart',
	]);

Route::get('/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);

Route::post('/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);



Route::group(['middleware'=>'guest'], function() {

	Route::get('/register', [
		'uses' => 'UserController@getRegister',
		'as' => 'user.register',
	]);

Route::post('/register', [
		'uses' => 'UserController@postRegister',
		'as' => 'user.register',
	]);
Route::get('/login', [
		'uses' => 'UserController@getLogin',
		'as' => 'user.login',
	]);

Route::post('/login', [
		'uses' => 'UserController@postLogin',
		'as' => 'user.login',
	]);

});

Route:: group(['middleware'=>'auth'], function() {

	Route::get('/logout', [
		'uses' => 'UserController@getLogout',
		'as' => 'user.logout',
	]);

	Route::get('/user/profile', [
		'uses' => 'HomeController@getProfile',
		'as' => 'user.profile',
		
	]);

});



