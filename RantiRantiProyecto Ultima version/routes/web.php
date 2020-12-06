<?php
use App\Http\Controllers\CrudControllers\InformacionController;
use App\Events\OrderStatusChangedEvent;
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

Route::get('/ca98tewagao32ri74as14p','PeticionesController@indexproducto');

Route::get('/c9789ate45641gorsdwiasr','PeticionesController@indexrecetas');

Route::get('/productos/{request}','PeticionesController@show');

Route::get('/recetas/{request}','PeticionesController@show');

Route::get('/{tipo}/detalle/{request}','PeticionesController@showviewdetalle');

Route::get('/detallesp/{request}','PeticionesController@showdetalleproducto');

Route::get('/detallesr/{request}','PeticionesController@showdetallereceta');

Route::get('/detallesi/{request}','PeticionesController@showdetalleingredientes');

Route::resource('/admi/users', 'CrudControllers\UsersController');

Route::resource('/informacion', 'CrudControllers\ClientesController');

Route::resource('/productosprotegido', 'CrudControllers\ProductosController');

Route::resource('/recetasprotegido', 'CrudControllers\RecetasController');

Route::resource('/categoriasP', 'CrudControllers\CategoriasPController');

Route::resource('/categoriasR', 'CrudControllers\CategoriasRController');

Route::get('/ingredientes/{idrecetas}', 'CrudControllers\IngredientesController@index_recetas');

Route::post('/ingredientes/create_recetas', 'CrudControllers\IngredientesController@create_recetas');

Route::delete('/ingredientes/eliminar/{id}/{idreceta}', 'CrudControllers\IngredientesController@destroy');

Route::get('/informacion_cliente/{id}', 'CrudControllers\ClientesController@index');

Route::get('/informacion_cliente/crear/{id}', 'CrudControllers\ClientesController@create');

Route::get('/direcciones/{id}', 'DireccionesController@index');

Route::post('/apiconfirmar/{crear}', 'DireccionesController@store');

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admi','AdministradorController@index');

Route::get('/clienteinformacion/{id}','InformacionController@informacion');

Route::get('/clienteperfil','InformacionController@perfil');

Route::get('/clientedirecciones','InformacionController@direcciones');

Route::get('/confirmaautentificacion','CarritoController@verificar');

Route::post('/agregarcarrito/{cantidad}','CarritoController@agregar');

Route::get('/borrarcarrito/{accion}','CarritoController@borrarcarrito');

Route::get('/vercarrito','CarritoController@carrito');

Route::get('pedidos','NotificacionesController@index');

Route::get('pedidos/detalles/{idpedido}','NotificacionesController@showdetalle');

Route::patch('pedidos/notificar/{idpedido}','NotificacionesController@update');

Route::get('/api/enviarsms/{numero}','NotificacionesController@sms');

Route::post('apiborrar/{index}','DireccionesController@delete');