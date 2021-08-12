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

Route::get('Crear-catalogo','App\Http\Controllers\CatalogoController@create');

Route::post('Guardar-catalogo','App\Http\Controllers\CatalogoController@store');

Route::get('Mostrar-catalogo','App\Http\Controllers\CatalogoController@show');

Route::get('Editar-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@edit');

Route::post('Actualizar-catalogo','App\Http\Controllers\CatalogoController@update');

Route::get('Baja-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@destroy');
