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

Route::get('Categoria-alta','App\Http\Controllers\CategoriaController@create');
Route::post('Categoria-guardar','App\Http\Controllers\CategoriaController@store');
Route::get('Categoria-ver','App\Http\Controllers\CategoriaController@show');
Route::get('Categoria-editar/{id}','App\Http\Controllers\CategoriaController@edit');
Route::post('Categoria-actualizar','App\Http\Controllers\CategoriaController@update');
Route::get('Categoria-baja/{id}','App\Http\Controllers\CategoriaController@destroy');
