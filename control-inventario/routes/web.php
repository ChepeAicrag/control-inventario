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

Route::get('Crear-bodega','App\Http\Controllers\BodegaController@create');

Route::get('Mostrar-bodega','App\Http\Controllers\BodegaController@show');

Route::get('Editar-bodega/{bodega}','App\Http\Controllers\BodegaController@edit');

Route::get('Baja-bodega/{bodega}','App\Http\Controllers\BodegaController@destroy');

Route::post('Guardar-bodega','App\Http\Controllers\BodegaController@store');

Route::post('Actualizar-bodega','App\Http\Controllers\BodegaController@update');
