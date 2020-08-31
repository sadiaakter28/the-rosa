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


Auth::routes();
Route::get('buffer-posting-lists', '\Bulkly\Http\Controllers\HelloController@index')->name('profile');
Route::get('buffer-posting-lists/search', '\Bulkly\Http\Controllers\HelloController@search')->name('search');
