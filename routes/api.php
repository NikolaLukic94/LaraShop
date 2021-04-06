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
// WIP
    Route::group(['prefix' => '/products'], function () {
        Route::post('/', 'API\ProductController@store');
        Route::patch('/{id}', 'API\ProductController@update');
        Route::get('/{id}', 'API\ProductController@show');
        Route::delete('/{id}', 'API\ProductController@destroy');
    });

    Route::group(['prefix' => '/cart-items'], function () {
        Route::get('/', 'API\CartItemsController@index');
        Route::post('/', 'API\CartItemsController@store');
        Route::post('/{id}/edit', 'API\CartItemsController@update');
        Route::delete('/{cartItem}', 'API\CartItemsController@destroy');
    });

    Route::get('/product-types', 'API\ProductTypeController');

    Route::get('/roles', 'API\RoleController');
    Route::get('/payment-methods', 'PaymentMethodController@getAll');

    Route::get('/users', 'API\UserController@index');

    Route::get('/orders', 'API\OrderController@index');

    Route::get('/user', 'API\UserController@authUser');

    Route::get('/auth-role', 'API\UserController@authUser');

    Route::post('/shipments', 'API\ShipmentController@index');

});
