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

Route::resource('/users', 'UsersController');

Route::resource('/informacion', 'ClientesController');

Route::resource('/productos', 'ProductosController');

Route::resource('/recetas', 'RecetasController');

Route::get('/ingredientes/{idrecetas}', 'IngredientesController@index_recetas');

Route::post('/ingredientes/create_recetas', 'IngredientesController@create_recetas');

Route::get('/informacion_cliente/{id}', 'ClientesController@index');

Route::get('/informacion_cliente/crear/{id}', 'ClientesController@create');

Route::get('/direcciones/{id}', 'DireccionesController@index');
