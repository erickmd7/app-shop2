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
Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');


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

    /**CATEGORIAS */
    Route::get('/categories','CategoryController@index'); //listado
    Route::get('/categories/create','CategoryController@create'); //formulario crear
    Route::post('categories','CategoryController@store'); //registra|r
    Route::get('/categories/{id}', 'CategoryController@show');// mostrar producto
    Route::get('/categories/{category}/edit','CategoryController@edit'); //formulario editar
    Route::post('/categories/{category}/edit','CategoryController@update'); //registrar cambio
    Route::delete('/categories/{category}','CategoryController@destroy');
});
