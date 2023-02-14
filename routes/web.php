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

Route::get('/', 'TestController@welcome');


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    // CREATE AND READ (CR)
    Route::get('/products','ProductController@index'); //listado
    Route::get('/products/create','ProductController@create'); //formulario crear
    Route::post('products','ProductController@store'); //registrar
    Route::get('/products/{id}', 'ProductController@show');// mostrar producto
    //ud
    Route::get('/products/{id}/edit','ProductController@edit'); //formulario editar
    Route::post('/products/{id}/edit','ProductController@update'); //registrar cambio
    Route::delete('/products/{id}','ProductController@destroy');

    Route::get('/products/{id}/images', 'ImageController@index');
    Route::post('/products/{id}/images', 'ImageController@store');
    Route::delete('/products/{id}/images', 'ImageController@destroy');
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select');
});
