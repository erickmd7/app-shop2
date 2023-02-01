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

Route::get('/', 'TestController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth','admin'])->group(function () {
    // CREATE AND READ (CR)
    Route::get('/admin/products','ProductController@index'); //listado
    Route::get('/admin/products/create','ProductController@create'); //formulario crear
    Route::post('/admin/products','ProductController@store'); //registrar
    
    //ud
    Route::get('/admin/products/{id}/edit','ProductController@edit'); //formulario editar
    Route::post('/admin/products/{id}/edit','ProductController@update'); //registrar cambio
    Route::delete('/admin/products/{id}','ProductController@destroy');
});
