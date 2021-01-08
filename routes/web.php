<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@welcome');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => 'verified'], function () {

    // create own api permissions controller
    Route::get('permissions', 'API\UserController@permissions');

    Route::get('order/payment', 'OrderController@create');

    Route::group(['prefix' => '/invoice-status-codes'], function() {
        Route::get('/', 'InvoiceStatusCodeController@index');
        Route::post('/', 'InvoiceStatusCodeController@store');
        Route::get('/{invoiceStatusCode}/edit', 'InvoiceStatusCodeController@edit');
        Route::patch('/{invoiceStatusCode}', 'InvoiceStatusCodeController@update');
        Route::delete('/{invoiceStatusCode}', 'InvoiceStatusCodeController@destroy');
    });

    Route::group(['prefix' => '/order-status-codes'], function() {
        Route::get('/', 'OrderStatusCodeController@index');
        Route::post('/', 'OrderStatusCodeController@store');
        Route::get('/{orderStatusCode}/edit', 'OrderStatusCodeController@edit');
        Route::patch('/{orderStatusCode}', 'OrderStatusCodeController@update');
        Route::delete('/{orderStatusCode}', 'OrderStatusCodeController@destroy');
    });

    Route::group(['prefix' => '/product-types'], function() {
        Route::get('/', 'ProductTypeController@index');
        Route::post('/', 'ProductTypeController@store');
        Route::get('/{productType}/edit', 'ProductTypeController@edit');
        Route::patch('/{productType}', 'ProductTypeController@update');
        Route::delete('/{productType}', 'ProductTypeController@destroy');
    });

    Route::group(['prefix' => '/payment-methods'], function() {
        Route::get('/', 'PaymentMethodController@index');
        Route::post('/', 'PaymentMethodController@store');
        Route::get('/{paymentMethod}/edit', 'PaymentMethodController@edit');
        Route::patch('/{paymentMethod}', 'PaymentMethodController@update');
        Route::delete('/{paymentMethod}', 'PaymentMethodController@destroy');
    });


    Route::group(['prefix' => '/orders'], function() {
        Route::get('/', 'OrderController@index');
        Route::post('/', 'OrderController@store');
        Route::get('/{order}/edit', 'OrderController@edit');
        Route::patch('/{order}', 'OrderController@update');
        Route::delete('/{order}', 'OrderController@destroy');
    });

    Route::group(['prefix' => '/order-items-status-codes'], function() {
        Route::get('/', 'OrderItemStatusCodeController@index');
        Route::post('/', 'OrderItemStatusCodeController@store');
        Route::get('/{orderItemStatusCode}/edit', 'OrderItemStatusCodeController@edit');
        Route::patch('/{orderItemStatusCode}', 'OrderItemStatusCodeController@update');
        Route::delete('/{orderItemStatusCode}', 'OrderItemStatusCodeController@destroy');
    });

    Route::group(['prefix' => '/users'], function() {
        Route::get('/', 'UserController@index');
        Route::get('/{user}', 'UserController@edit');
        Route::post('/', 'UserController@store');
        Route::get('/{user}/edit', 'UserController@edit');
        Route::post('/users/update/{user}', 'UserController@update'); // todo: unify
        Route::delete('/{user}', 'UserController@destroy');
    });

    Route::group(['prefix' => '/roles'], function() {
        Route::get('/', 'RoleController@index');
        Route::get('/{role}', 'RoleController@show');
        Route::post('/', 'RoleController@store');
        Route::get('/{roles}/edit', 'RoleController@edit');
        Route::post('roles/{role}', 'RoleController@update'); // todo
        Route::delete('/{roles}', 'RoleController@destroy');
    });

    Route::group(['prefix' => 'reports'], function() {
        Route::get('/', 'ReportController@index');
        Route::get('/create', 'ReportController@store');
    });

    Route::group(['prefix' => 'invoices', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'InvoiceController@getAll');
        Route::get('/index', 'InvoiceController@index');
    });

    Route::get('/cart/index', 'CartItemController');

    Route::post('/cart/create/{id}', 'CartController@store');

    Route::group(['prefix' => 'products'], function() {
        Route::get('/', 'ProductController@index');
        Route::post('/create', 'ProductController@store');
        Route::post('/edit', 'ProductController@update');
        Route::get('/search', 'ProductController@search');
        Route::get('/show/{product}', 'ProductController@show');
        Route::post('/delete/{id}', 'ProductController@destroy');
    });

    Route::group(['prefix' => 'shipments', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/home', 'ShipmentController@home');
        Route::get('/index', 'ShipmentController@index');
        Route::get('/index/all', 'ShipmentController@browse');
    });

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', 'DashboardChartController@index');
        Route::get('/monthly-breakdown', 'DashboardChartController@getMonthlySalesBreakdown');
    });

    Route::group(['prefix' => '/api/cart-items' ], function() {
        Route::get('/', 'API\CartItemsController@index');
        Route::post('/', 'API\CartItemsController@store');
        Route::post('/{id}/edit', 'API\CartItemsController@update');
        Route::delete('/{cartItem}', 'API\CartItemsController@destroy');
    });
});

Route::post('stripe-payment', 'StripeController@store')->name('stripe.payment');
Route::get('checkout', 'StripeController@index');




