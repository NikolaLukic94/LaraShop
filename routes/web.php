<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@welcome');

Route::group(['prefix' => '/login'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});

Route::group(['middleware' => 'verified'], function () {

    Route::get('/products', 'ProductController@index');

    Route::get('/statuses', 'StatusController@index');

    Route::get('/orders', 'OrderController@index');

    Route::get('/users', 'UserController@index');

    Route::get('/roles', 'RoleController@index');

    Route::get('/product-types', 'ProductTypeController@index');

    Route::get('/payment-methods', 'PaymentMethodController@index');

    Route::get('permissions', function () {
        return view('permissions.index');
    });

    Route::get('order/payment', 'OrderController@create');

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/', 'ReportController@index');
        Route::get('/create', 'ReportController@store');
    });

    Route::group(['prefix' => 'invoices', 'middleware' => ['role:superadmin|admin']], function () {
        Route::get('/', 'InvoiceController@getAll');
        Route::get('/index', 'InvoiceController@index');
    });

    Route::get('shipments', 'ShipmentController@index');
});

Route::post('stripe-payment', 'StripeController@store')->name('stripe.payment');
Route::get('checkout', 'StripeController@index');




