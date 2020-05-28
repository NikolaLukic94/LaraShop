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

Route::get('/nav', function () {
    return view('partials/navbar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/index', 'ProductController@index');
Route::get('/products', 'ProductController@getAll');
Route::get('/products/create', 'ProductController@store');

Route::get('/product-types', 'ProductTypeController@getAll');

Route::get('/users/', 'UserController@getAll');

// Route::get('/invoices/', 'InvoiceController@getAll');

Route::get('/invoice-status-codes', 'InvoiceStatusCodeController@getAll');
Route::get('/invoice-status-codes/index', 'InvoiceStatusCodeController@index');
Route::post('/invoice-status-codes/create', 'InvoiceStatusCodeController@store');
Route::post('/invoice-status-codes/delete/{id}', 'InvoiceStatusCodeController@delete');

Route::get('/order-item-status-codes', 'OrderItemStatusCodeController@getAll');
Route::get('/order-item-status-codes/index', 'OrderItemStatusCodeController@index');
Route::post('/order-item-status-codes/create', 'OrderItemStatusCodeController@store');
Route::post('/order-item-status-codes/delete/{id}', 'OrderItemStatusCodeController@delete');

Route::get('/order-status-codes', 'OrderStatusCodeController@getAll');
Route::get('/order-status-codes/index', 'OrderStatusCodeController@index');
Route::post('/order-status-codes/create', 'OrderStatusCodeController@store');
Route::post('/order-status-codes/delete/{id}', 'OrderStatusCodeController@delete');

Route::get('/product-types', 'ProductTypeController@getAll');
Route::get('/product-types/index', 'ProductTypeController@index');
Route::post('/product-types/create', 'ProductTypeController@store');
Route::post('/product-types/delete/{id}', 'ProductTypeController@delete');