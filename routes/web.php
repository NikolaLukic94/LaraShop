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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nav', function () {
    return view('partials/navbar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/index', 'ProductController@index');
Route::get('/products', 'ProductController@getAll');
Route::get('/products/create', 'ProductController@store');

Route::get('/product-types', 'ProductTypeController@getAll');

Route::get('/users/', 'UserController@getAll');
