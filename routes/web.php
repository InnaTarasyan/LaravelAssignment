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

Route::get( '/', 'HomeController@index');
Route::post('store', ['uses' => 'HomeController@store', 'as' => 'store']);
Route::put('update', ['uses' => 'HomeController@update', 'as' => 'update']);


Route::resource('news', 'NewsController');
Route::match(['get', 'post'], 'gallery', ['uses' => 'GalleryController@index', 'as' => 'gallery']);

