<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/order-status-codes', 'API\OrderStatusCodeController');

Route::get('/invoice-status-codes', 'API\InvoiceStatusCodeController');

Route::get('/order-item-status-codes', 'API\OrderItemStatusCodeController');

Route::get('/product-types', 'API\ProductTypeController');

Route::get('/roles', 'API\RoleController');

Route::get('/payment-methods', 'PaymentMethodController@getAll');

Route::get('/users', 'API\UserController@index');

Route::get('/orders', 'API\OrderController@index');

Route::get('/user', 'API\UserController@authUser');

Route::get('/search', 'API\ProductController@search');

Route::post('/products/filter', 'API\ProductController@filter');

Route::get('/auth-role', 'API\UserController@authUser');

Route::post('/shipments', 'API\ShipmentController@index');

Route::get('/products/{id}', 'API\ProductController@show');

Route::get('/products/', 'API\ProductController@index');
