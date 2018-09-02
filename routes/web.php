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

//Route::get('/',[
//		'uses' => 'HomeController@getHome',
//		'as' => 'home.home',
//]);
Route::get('/', [
		'uses' => 'ProductController@getIndex',
		'as' => 'product.home',
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
		'as' => 'user.loginPage',
	]);


});

Route::post('/login/authenticated', [
    'uses' => 'UserController@postLogin',
    'as' => 'login.authenticated'
]);

Route::post('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout',
]);

Route:: group(['middleware'=>'auth'], function() {

	Route::get('/user/profile', [
		'uses' => 'HomeController@getProfile',
		'as' => 'user.profile',
		
	]);

});

Route::get('reserve', 'ReserveController@index')->name('reserve');

Route::get('/table/{id}', 'ReserveController@table');

Route::post('/table/reserve/{id}', 'ReserveController@reserve');

Route::post('/cancel/{id}', 'ReserveController@cancel');

Route::get('/table/{id}/payment', [
    'uses' => 'ReserveController@payment',
    'as' => 'payment',

]);

Route::post('/table/{id}/payment', [
    'uses' => 'ReserveController@postPayment',
    'as' => 'user.payment',

]);


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', function (){
        return view('home');
    })->name('home');
    Route::get('/dashboard', function (){
        $products = \App\Product::all();
        return view('admin/products', ['products' => $products]);
    })->name('dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'AdminController');