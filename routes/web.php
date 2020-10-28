<?php

use Illuminate\Support\Facades\Route;

// todo: Apply midleware

Route::get('/', 'HomeController@welcome');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => 'verified'], function () {

    Route::get('/s', 'StoreController@indexA');

    Route::resource('invoice-status-codes', 'InvoiceStatusCodeController')->except([
        'create', 'show'
    ]);

    Route::resource('order-status-codes', 'OrderStatusCodeController')->except([
        'create', 'show'
    ]);

    Route::resource('product-types', 'ProductTypeController')->except([
        'create', 'show'
    ]);

    Route::resource('payment-methods', 'PaymentMethodController')->except([
        'create', 'show'
    ]);

    Route::resource('orders', 'OrderController')->except([
        'create', 'show'
    ]);

    Route::resource('order-item-status-codes', 'OrderItemStatusCodeController')->only([
        'index', 'update', 'delete'
    ]);

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('cupons', 'CuponsController');

    Route::get('/checkout', 'CheckoutController@index');

    Route::group(['prefix' => 'reports'], function() {
        Route::get('/', 'ReportController@index');
        Route::get('/create', 'ReportController@store');
    });

    Route::group(['prefix' => 'invoices', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'InvoiceController@getAll');
        Route::get('/index', 'InvoiceController@index');
    });

    Route::resource('cart-items', 'CartItemController')->only([
        'store', 'destroy'
    ]);
    Route::post('/cart-items/{id}', 'CartItemController@update');

    Route::group(['prefix' => '/user-addresses'], function() {
        Route::get('/', 'UserAddressController@getAll');
        Route::post('/create', 'UserAddressController@store');
    });

    Route::get('/cart/index', 'CartController@index');
    Route::post('/cart/create/{id}', 'CartController@store'); // create users cart
    // Route::post('/cart-items', 'CartItemController@store'); // create users cart
    // tehnically, this is just an update
    
    Route::group(['prefix' => 'products'], function() {
        Route::get('/home', 'ProductController@home');
        Route::get('/', 'ProductController@getAll');
        Route::get('/index', 'ProductController@index');// todo: redo to be admin only
        Route::get('/index/all', 'ProductController@browse');// todo: redo to be users only
        Route::post('/create', 'ProductController@store');
        Route::get('/search', 'ProductController@search');
        Route::post('/filter', 'ProductController@filter');
        Route::post('/delete/{id}', 'ProductController@destroy');
    });

    Route::group(['prefix' => 'shipments', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/home', 'ShipmentController@home');
        Route::get('/', 'ShipmentController@getAll');
        Route::get('/index', 'ShipmentController@index');// todo: redo to be admin only
        Route::get('/index/all', 'ShipmentController@browse');// todo: redo to be users only
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'DashboardChartController@index');
        Route::get('/monthly-breakdown', 'DashboardChartController@getMonthlySalesBreakdown');
    });

    Route::group(['prefix' => 'product-images', 'middleware' => ['role:superadmin|admin']], function() {
        Route::post('/create', 'ProductImage@store');
        Route::post('/delete/{id}', 'ProductImage@delete');
    });
});

Route::get('stripe-payment', 'StripeController@handleGet'); //todo: remove
Route::post('stripe-payment', 'StripeController@store')->name('stripe.payment');



