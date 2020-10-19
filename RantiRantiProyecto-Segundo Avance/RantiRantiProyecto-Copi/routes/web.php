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

Route::get('/','PeticionesController@index_cate');

Route::get('/productos/{request}','PeticionesController@show');

Route::get('/recetas/{request}','PeticionesController@show');

Route::resource('/admi/users', 'UsersController');

Route::resource('/informacion', 'ClientesController');

Route::resource('/productosprotegido', 'ProductosController');

Route::resource('/recetasprotegido', 'RecetasController');

Route::resource('/categoriasP', 'CategoriasPController');

Route::resource('/categoriasR', 'CategoriasRController');

Route::get('/ingredientes/{idrecetas}', 'IngredientesController@index_recetas');

Route::post('/ingredientes/create_recetas', 'IngredientesController@create_recetas');

Route::get('/informacion_cliente/{id}', 'ClientesController@index');

Route::get('/informacion_cliente/crear/{id}', 'ClientesController@create');

Route::get('/direcciones/{id}', 'DireccionesController@index');


Auth::routes();

Route::get('/index', 'HomeController@index');

Route::get('/admi','AdministradorController@index');

