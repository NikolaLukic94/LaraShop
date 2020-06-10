<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'products'], function() {
    Route::get('/home', 'ProductController@home');
    Route::get('/', 'ProductController@getAll');
    Route::get('/index', 'ProductController@index');// todo: redo to be admin only
    Route::get('/index/all', 'ProductController@browse');// todo: redo to be users only
    Route::get('/create', 'ProductController@store');
});


Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'UserController@getAll');
    Route::get('/index', 'UserController@index');
    Route::post('/delete/{id}', 'UserController@delete');
});

Route::group(['prefix' => 'invoices'], function() {
    Route::get('/', 'InvoiceController@getAll');
    Route::get('/index', 'InvoiceController@index');
});

Route::group(['prefix' => 'invoice-status-codes'], function() {
    Route::get('/', 'InvoiceStatusCodeController@getAll');
    Route::get('/index', 'InvoiceStatusCodeController@index');
    Route::post('/create', 'InvoiceStatusCodeController@store');
    Route::post('/delete/{id}', 'InvoiceStatusCodeController@delete');
});

Route::group(['prefix' => 'order-item-status-codes'], function() {
    Route::get('/', 'OrderItemStatusCodeController@getAll');
    Route::get('/index', 'OrderItemStatusCodeController@index');
    Route::post('/create', 'OrderItemStatusCodeController@store');
    Route::post('/delete/{id}', 'OrderItemStatusCodeController@delete');
});

Route::group(['prefix' => 'order-status-codes'], function() {
    Route::get('/order-status-codes', 'OrderStatusCodeController@getAll');
    Route::get('/order-status-codes/index', 'OrderStatusCodeController@index');
    Route::post('/order-status-codes/create', 'OrderStatusCodeController@store');
    Route::post('/order-status-codes/delete/{id}', 'OrderStatusCodeController@delete');
});

Route::group(['prefix' => 'product-types'], function() {
    Route::get('/product-types', 'ProductTypeController@getAll');
    Route::get('/product-types/index', 'ProductTypeController@index');
    Route::post('/product-types/create', 'ProductTypeController@store');
    Route::post('/product-types/delete/{id}', 'ProductTypeController@delete');
});


Route::group(['prefix' => 'payment-methods'], function() {
    Route::get('/', 'PaymentMethodController@getAll');
    Route::get('/index', 'PaymentMethodController@index');
    Route::post('/create', 'PaymentMethodController@store');
    Route::post('/delete/{id}', 'PaymentMethodController@delete');
});

Route::get('/cart/index/{id}', 'CartController@index');
Route::post('/cart/create/{id}', 'CartController@store'); // create users cart

Route::post('/cart-items/create', 'CartItemController@store'); // create users cart

Route::post('/product-images/create', 'ProductImage@store');
Route::post('/product-images/delete/{id}', 'ProductImage@delete');

