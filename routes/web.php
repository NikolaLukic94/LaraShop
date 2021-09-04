<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/login'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});

Route::get('/reports/create', 'ReportController@store');

Route::get('/spa/{any}', function () {
    return view('welcome');
});





