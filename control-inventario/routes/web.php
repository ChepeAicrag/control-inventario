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

//rutas de catalogo
Route::get('Catalogo','App\Http\Controllers\CatalogoController@index');

Route::get('Crear-catalogo','App\Http\Controllers\CatalogoController@create');

Route::post('Guardar-catalogo','App\Http\Controllers\CatalogoController@store');

Route::get('Mostrar-catalogo','App\Http\Controllers\CatalogoController@show');

Route::get('Editar-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@edit');

Route::post('Actualizar-catalogo','App\Http\Controllers\CatalogoController@update');

Route::get('Baja-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@destroy');

//rutas de reporte
Route::get('Reporte','App\Http\Controllers\ReporteController@index');

Route::get('Crear-Reporte','App\Http\Controllers\ReporteController@create');

Route::post('Guardar-Reporte','App\Http\Controllers\ReporteController@store');

Route::get('Mostrar-Reporte','App\Http\Controllers\ReporteController@show');

Route::get('Editar-Reporte/{reporte}','App\Http\Controllers\ReporteController@edit');

Route::post('Actualizar-Reporte','App\Http\Controllers\ReporteController@update');

Route::get('Baja-Reporte/{reporte}','App\Http\Controllers\ReporteController@destroy');
