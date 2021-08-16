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
    return view('/auth/login');

});

Route::get('/inicio', function () {
    return view('principal');
});

/* RUTAS DE BODEGEAS */
Route::get('Crear-bodega','App\Http\Controllers\BodegaController@create');
Route::get('Bodega/{bodega}','App\Http\Controllers\BodegaController@show')->name('bodega.show');
Route::get('Editar-bodega/{bodega}','App\Http\Controllers\BodegaController@edit');
Route::get('Baja-bodega/{bodega}','App\Http\Controllers\BodegaController@destroy');
Route::post('Guardar-bodega','App\Http\Controllers\BodegaController@store');
Route::post('Actualizar-bodega','App\Http\Controllers\BodegaController@update');
Route::get('Mostrar-bodega','App\Http\Controllers\BodegaController@index')->name('bodega.index');

/* RUTAS DE CATEGORIAS */
Route::get('Categoria-alta','App\Http\Controllers\CategoriaController@create');
Route::post('Categoria-guardar','App\Http\Controllers\CategoriaController@store');
Route::get('Categoria-ver','App\Http\Controllers\CategoriaController@index')->name('categoria.index');
Route::get('Categoria-editar/{id}','App\Http\Controllers\CategoriaController@edit');
Route::post('Categoria-actualizar','App\Http\Controllers\CategoriaController@update')->name('categoria.update');
Route::get('Categoria-baja/{id}','App\Http\Controllers\CategoriaController@destroy');
Route::get('Categoria/{categoria}','App\Http\Controllers\CategoriaController@show')->name('categoria.show');

/* RUTAS DE CATALOGOS */

Route::get('Catalogo','App\Http\Controllers\CatalogoController@index')->name('catalogo.index');
Route::get('Crear-catalogo','App\Http\Controllers\CatalogoController@create');
Route::post('Guardar-catalogo','App\Http\Controllers\CatalogoController@store');
Route::get('Mostrar-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@show')->name('catalogo.show');
Route::get('Editar-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@edit');
Route::post('Actualizar-catalogo','App\Http\Controllers\CatalogoController@update');
Route::get('Baja-catalogo/{catalogo}','App\Http\Controllers\CatalogoController@destroy');

/* RUTAS DE PRODUCTOS */
Route::post('productos/crear', 'App\Http\Controllers\ProductoController@store');
Route::get('productos', 'App\Http\Controllers\ProductoController@create')->name('productos.crear');
Route::get('productos/index', 'App\Http\Controllers\ProductoController@index')->name('productos.index');
Route::get('productos/{producto}/edit', 'App\Http\Controllers\ProductoController@edit')->name('productos.edit');
Route::post('productos/producto/{producto}', 'App\Http\Controllers\ProductoController@update')->name('productos.update');
Route::get('productos/delete/{producto}','App\Http\Controllers\ProductoController@destroy')->name('productos.destroy');
Route::get('productos/{producto}','App\Http\Controllers\ProductoController@show')->name('productos.show');

/* RUTAS DE REPORTES */
Route::get('Reporte','App\Http\Controllers\ReporteController@index');
Route::get('Crear-Reporte','App\Http\Controllers\ReporteController@create');
Route::post('Guardar-Reporte','App\Http\Controllers\ReporteController@store');
Route::get('Mostrar-Reporte','App\Http\Controllers\ReporteController@show')->name('reporte.show');
Route::get('Editar-Reporte/{reporte}','App\Http\Controllers\ReporteController@edit');
Route::post('Actualizar-Reporte','App\Http\Controllers\ReporteController@update');
Route::get('Baja-Reporte/{reporte}','App\Http\Controllers\ReporteController@destroy');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*RUTAS DEL STOCK*/
Route::get('Stock/{producto}','App\Http\Controllers\ReporteController@stock');
Route::post('StockP','App\Http\Controllers\ReporteController@stockP');

/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */