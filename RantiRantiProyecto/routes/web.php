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

Route::get('/', function () {
    return view('IndexMenu');
});

Route::resource('/clientes', 'ClientesController');

Route::resource('/productos', 'ProductosController');

Route::resource('/administradores', 'AdministradoresController');

Route::resource('/recetas', 'RecetasController');