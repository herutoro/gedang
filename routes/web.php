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

/* Route::get('/', function () {
    return view('dash/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories','Categories');
	//penggunaan routes dari laravel yang menggunakan default method dari bawaan laravel seperti index, create, update, store, show, dan destroy.
Route::resource('product','Product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

//

Route::get('/front', 'Front\FrontPages@index')->name('front');
Route::resource('/cart', 'Front\CartController');
Route::get('/cart/add-item/{id}', 'Front\CartController@addItem')->name('cart.addItem');

Route::get('/', function() {
    return redirect(route('login'));
});

Auth::routes();

Route::get('admin', function () {
    return view('dash/index');
    });

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/categories', 'Categories')->except([
        'create', 'show'
    ]);

    Route::resource('/product', 'Product');

    Route::resource('/bank', 'Bank');
    
    Route::get('/home', 'HomeController@index')->name('home');
    
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
