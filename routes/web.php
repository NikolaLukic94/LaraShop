<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/login'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});

Route::get('/roles', function() {
    return view('roles.index');
});

Route::get('/dashboard', function() {
    return view('dashboard.index');
});

Route::get('/permissions', function() {
    return view('permissions.index');
});

Route::get('/products', function() {
    return view('products.index');
});

Route::get('/statuses', function() {
    return view('statuses.index');
});

Route::get('/shipments', function() {
    return view('shipments.index');
});

Route::get('/reports', function() {
    return view('reports.index');
});

Route::get('/reports', function() {
    return view('reports.index');
});

Route::get('/reports/create', 'ReportController@store');

Route::get('/users', function() {
    return view('users.index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/spa/{any}', function () {
    return view('welcome');
});





