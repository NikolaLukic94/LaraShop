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

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/', 'HomeController@welcome');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/test-sidebar', function () {
    return view('test');
});

Route::group(['middleware' => 'verified'], function () {

    Route::group(['prefix' => '/cart-items'], function() {
        Route::post('/quantity/increase/{id}', 'CartItemController@increaseQuantity');
        Route::post('/store', 'CartItemController@store');
        Route::post('/quantity/decrease/{id}', 'CartItemController@decreaseQuantity');
        Route::post('/quantity/change/{id}', 'CartItemController@changeQuantity');
        Route::post('/delete/{id}', 'CartItemController@destroy');
        // todo: move
        Route::get('/index', 'CartController@all');
    });

    Route::group(['prefix' => '/orders', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'OrderController@getAll');
        Route::get('/index', 'OrderController@index');
        Route::post('/create', 'OrderController@store');
    });

    Route::group(['prefix' => '/user-payments', 'middleware' => ['role:superadmin|admin']], function() {
        Route::post('/create', 'UserPaymentMethodController@store');
    });

    Route::group(['prefix' => '/user-addresses', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/api/user/show/{id}', 'UserController@getUserData');
        Route::get('/', 'UserAddressController@getAll');
        Route::post('/create', 'UserAddressController@store');
    });

    Route::group(['middleware' => ['role:superadmin|admin|customer']], function() {
        
        Route::get('/cart/getAll', 'CartController@getAll');
    });

    Route::get('/checkout', 'CheckoutController@index');

    Route::get('/cart/index', 'CartController@index');
    Route::post('/cart/create/{id}', 'CartController@store'); // create users cart
    Route::post('/cart-items/create', 'CartItemController@store'); // create users cart

    Route::group(['prefix' => 'invoices', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'InvoiceController@getAll');
        Route::get('/index', 'InvoiceController@index');
    });

    Route::group(['prefix' => 'invoice-status-codes', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'InvoiceStatusCodeController@getAll');
        Route::get('/index', 'InvoiceStatusCodeController@index');
        Route::post('/update/{id}', 'InvoiceStatusCodeController@update');
        Route::post('/create', 'InvoiceStatusCodeController@store');
        Route::post('/delete/{id}', 'InvoiceStatusCodeController@delete');
    });

    Route::group(['prefix' => 'order-item-status-codes', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'OrderItemStatusCodeController@getAll');
        Route::get('/index', 'OrderItemStatusCodeController@index');
        Route::post('/edit/{id}', 'OrderItemStatusCodeController@update');
        Route::post('/create', 'OrderItemStatusCodeController@store');
        Route::post('/delete/{id}', 'OrderItemStatusCodeController@delete');
    });

    Route::group(['prefix' => 'order-status-codes', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'OrderStatusCodeController@getAll');
        Route::get('/index', 'OrderStatusCodeController@index');
        Route::post('/edit/{id}', 'OrderStatusCodeController@update');
        Route::post('/create', 'OrderStatusCodeController@store');
        Route::post('/delete/{id}', 'OrderStatusCodeController@delete');
    });

    Route::group(['prefix' => 'product-types', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('', 'ProductTypeController@getAll');
        Route::get('/index', 'ProductTypeController@index');
        Route::post('/create', 'ProductTypeController@store');
        Route::post('/edit/{id}', 'ProductTypeController@update');
        Route::post('/delete/{id}', 'ProductTypeController@delete');
    });

    Route::group(['prefix' => 'payments', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'PaymentController@getAll');
        Route::get('/index', 'PaymentController@index');
        Route::post('/store', 'PaymentController@store');
        Route::post('/delete/{id}', 'PaymentController@delete');
    });

    Route::group(['prefix' => 'payment-methods', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'PaymentMethodController@getAll');
        Route::get('/index', 'PaymentMethodController@index');
        Route::post('/create', 'PaymentMethodController@store');
        Route::post('/edit/{id}', 'PaymentMethodController@update');
        Route::post('/delete/{id}', 'PaymentMethodController@delete');
    });

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

    Route::group(['prefix' => 'reports'
    // , 'middleware' => ['role:superadmin|admin']
], function() {
        Route::get('/', 'ReportController@index');
        Route::get('/create', 'ReportController@store');
    });

    Route::group(['prefix' => 'users', 
    // 'middleware' => ['role:superadmin|admin']
    ], function() {
        Route::get('/', 'UserController@getAll');
        Route::get('/index', 'UserController@index');
        Route::get('/user/{id}', 'UserController@user');
        Route::post('/create', 'UserController@store');
        Route::get('/show/{id}', 'UserController@show');
        Route::get('/data/{id}', 'UserController@getUserData');
        Route::post('/update/{id}', 'UserController@update');
        Route::post('/delete/{id}', 'UserController@delete');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => ['role:superadmin|admin']], function() {
        Route::get('/', 'DashboardChartController@index');
        Route::get('/monthly-breakdown', 'DashboardChartController@getMonthlySalesBreakdown');
    });

    Route::group(['prefix' => 'product-images', 'middleware' => ['role:superadmin|admin']], function() {
        Route::post('/create', 'ProductImage@store');
        Route::post('/delete/{id}', 'ProductImage@delete');
    });

    Route::group(['prefix' => 'roles'
    // , 'middleware' => ['role:superadmin|admin']
], function() {
        Route::get('/index', 'RoleController@index');
        Route::get('/show/{id}', 'RoleController@show');
        Route::get('/create', 'RoleController@create');
        Route::post('/create', 'RoleController@store');
        Route::post('/edit/{id}', 'RoleController@update');
    });
});



