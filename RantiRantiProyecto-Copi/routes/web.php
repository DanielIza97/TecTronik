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

Route::resource('/productos', 'ProductosController');

Route::resource('/administradores', 'AdministradoresController');

Route::resource('/recetas', 'RecetasController');

Route::get('/ingredientes/{idrecetas}', 'IngredientesController@index_recetas');

Route::post('/ingredientes/create_recetas', 'IngredientesController@create_recetas');