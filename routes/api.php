<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', 'API\ProductController@index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => '/statuses'], function () {
        Route::get('/', 'API\StatusController@index');
        Route::post('/', 'API\StatusController@store');
        Route::patch('/{id}', 'API\StatusController@update');
        Route::delete('/{id}', 'API\StatusController@destroy');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::post('/', 'API\ProductController@store');
        Route::patch('/{id}', 'API\ProductController@update');
        Route::get('/{id}', 'API\ProductController@show');
        Route::delete('/{id}', 'API\ProductController@destroy');
    });

    // FE todo: adding to cart, removing from cart etc
    Route::group(['prefix' => '/order-items'], function () {
        Route::get('/', 'API\OrderItemsController@index');
        Route::post('/', 'API\OrderItemsController@store');
        Route::post('/{id}/edit', 'API\OrderItemsController@update');
        Route::delete('/{cartItem}', 'API\OrderItemsController@destroy');
    });

    Route::group(['prefix' => '/orders'], function () {
        Route::post('/', 'API\OrderController@store');
        Route::get('/{order}/edit', 'API\OrderController@edit');
        Route::patch('/{order}', 'API\OrderController@update');
        Route::delete('/{order}', 'API\OrderController@destroy');
    });

    Route::group(['prefix' => '/roles'], function () {
        Route::get('/', 'API\RoleController@index');
        Route::get('/{role}', 'API\RoleController@show');
        Route::post('/', 'API\RoleController@store');
        Route::get('/{roles}/edit', 'API\RoleController@edit');
        Route::post('/roles/{role}', 'API\RoleController@update'); // todo
        Route::delete('/{roles}', 'API\RoleController@destroy');
    });

    Route::group(['prefix' => '/product-types'], function () {
        Route::post('/', 'ProductTypeController@store');
        Route::get('/{productType}/edit', 'ProductTypeController@edit');
        Route::patch('/{productType}', 'ProductTypeController@update');
        Route::delete('/{productType}', 'ProductTypeController@destroy');
    });

    Route::group(['prefix' => '/payment-methods'], function () {
        Route::post('/', 'PaymentMethodController@store');
        Route::get('/{paymentMethod}/edit', 'PaymentMethodController@edit');
        Route::patch('/{paymentMethod}', 'PaymentMethodController@update');
        Route::delete('/{paymentMethod}', 'PaymentMethodController@destroy');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'API\DashboardChartController@index');
        Route::get('/monthly-breakdown', 'API\DashboardChartController@getMonthlySalesBreakdown');
    });

    Route::get('/permissions', 'API\PermissionController@index');

    Route::get('/payment-methods', 'PaymentMethodController@getAll');

    Route::get('/users', 'API\UserController@index');
    Route::get('/user', 'API\UserController@user');

    Route::get('/orders', 'API\OrderController@index');

    Route::get('/user', 'API\UserController@authUser');

    Route::get('/auth-role', 'API\UserController@authUser');

    Route::post('/shipments', 'API\ShipmentController@index');
});
