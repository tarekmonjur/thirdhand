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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/product', 'HomeController@index');
Route::get('/product/{slug}', 'HomeController@product');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/devices', 'DashboardController@showDevices');
Route::get('/device-add', 'DashboardController@addDevice');
Route::post('/device-store', 'DashboardController@storeDevice');
Route::get('/device-edit/{id}', 'DashboardController@editDevice');
Route::put('/device-update/{id}', 'DashboardController@updaetDevice');
Route::get('/device-delete/{id}', 'DashboardController@deleteDevice');

Route::get('/customers', 'DashboardController@showCustomers');
Route::get('/sms-logs', 'DashboardController@smsLogs');
Route::get('/sms-send', 'DashboardController@sendSMS');

Route::get('/products', 'ProductController@showProduct');
Route::get('/product-add', 'ProductController@addProduct');
Route::post('/product-store', 'ProductController@storeProduct');
Route::get('/product-edit/{id}', 'ProductController@editProduct');
Route::post('/product-edit/{id}', 'ProductController@updaetProduct');
Route::get('/product-delete/{id}', 'ProductController@deleteProduct');


