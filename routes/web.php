<?php

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
Route::resource('/products','ProductController');
Route::resource('/orders','OrderController');
Route::resource('/ordersinprog','OrderInProgController');
Route::resource('/cost','CostController');
Route::get('/editProduct', 'ProductController@handleProducts')->name('editPage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
