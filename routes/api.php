<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', 'API\ProductController@index');

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

    Route::group(['prefix' => '/order-items'], function () {
        Route::get('/', 'API\OrderItemsController@index');
        Route::post('/', 'API\OrderItemsController@store');
        Route::post('/{id}/edit', 'API\OrderItemsController@update');
        Route::delete('/{cartItem}', 'API\OrderItemsController@destroy');
    });

    Route::group(['prefix' => '/orders'], function () {
        Route::post('/', 'OrderController@store');
        Route::get('/{order}/edit', 'OrderController@edit');
        Route::patch('/{order}', 'OrderController@update');
        Route::delete('/{order}', 'OrderController@destroy');
    });

    Route::group(['prefix' => '/roles'], function () {
//    Route::get('/', 'RoleController@index');
        Route::get('/{role}', 'RoleController@show');
        Route::post('/', 'RoleController@store');
        Route::get('/{roles}/edit', 'RoleController@edit');
        Route::post('/roles/{role}', 'RoleController@update'); // todo
        Route::delete('/{roles}', 'RoleController@destroy');
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
        Route::get('/', 'DashboardChartController@index');
        Route::get('/monthly-breakdown', 'DashboardChartController@getMonthlySalesBreakdown');
    });

    Route::get('/roles', 'API\RoleController');

    Route::get('/permissions', 'API\PermissionController@index');

    Route::get('/payment-methods', 'PaymentMethodController@getAll');

    Route::get('/users', 'API\UserController@index');

    Route::get('/orders', 'API\OrderController@index');

    Route::get('/user', 'API\UserController@authUser');

    Route::get('/auth-role', 'API\UserController@authUser');

    Route::post('/shipments', 'API\ShipmentController@index');

});
