<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/order-status-codes', 'OrderStatusCodeController@getAll');
Route::get('/invoice-status-codes', 'InvoiceStatusCodeController@getAll');
Route::get('/order-item-status-codes', 'OrderItemStatusCodeController@getAll');
Route::get('/product-types', 'ProductTypeController@getAll');
Route::get('/payment-methods', 'PaymentMethodController@getAll');
Route::get('/cart-items', 'CartController@all');
Route::get('/users', 'UserController@getAll');
Route::get('/orders', 'OrderController@getAll');
Route::get('/stores', 'StoreController@index');
Route::get('/users/{user}', 'UserController@show');

