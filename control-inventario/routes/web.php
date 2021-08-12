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

Route::get('/inicio', function () {
    return view('principal');
});
/* RUTAS DE PRODUCTOS */
Route::post('productos/crear', 'App\Http\Controllers\ProductoController@store');
Route::get('productos', 'App\Http\Controllers\ProductoController@create')->name('productos.crear');
Route::get('productos/index', 'App\Http\Controllers\ProductoController@index')->name('productos.index');
Route::get('productos/{producto}/edit', 'App\Http\Controllers\ProductoController@edit')->name('productos.edit');
Route::post('productos/producto/{producto}', 'App\Http\Controllers\ProductoController@update')->name('productos.update');
Route::get('productos/delete/{producto}','App\Http\Controllers\ProductoController@destroy')->name('productos.destroy');
Route::get('productos/{producto}','App\Http\Controllers\ProductoController@show')->name('productos.show');