<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('verRutas', 'VerRutasController@index');

Route::get('insertarRuta', 'InsertarRutaController@index');

Route::get('editarRuta', 'EditarRutaController@index');

//Route::post('insertarRuta', 'InsertarRutaController@postGuardar');

Route::get('detallesRuta', 'DetallesRutaController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'contacto' => 'ContactoController',
    'catalogo' => 'CatalogoController',
    'verRutas' => 'VerRutasController',
    'insertarRuta' => 'InsertarRutaController',
    'registro' => 'RegistroUsuarioController',
    'listado'  => 'ListadoController',
    
]);

Route::get('usuario','UsuarioController@index');
Route::get('usuario/listado','UsuarioController@listar');
Route::get('usuario/crear',['middleware'=>'auth', 'uses'=>'UsuarioController@crear']);
Route::post('usuario/crear',['middleware'=>'auth', 'uses'=>'UsuarioController@guardar']);
Route::post('insertarRuta',['middleware'=>'auth', 'uses'=>'InsertarRutaController@postGuardar']);
Route::post('editarRuta',['middleware'=>'auth', 'uses'=>'EditarRutaController@postEditar']);
Route::get('usuario/ver/{id}',['middleware'=>'auth', 'uses'=>'UsuarioController@ver']);
Route::get('usuario/eliminar/{id}',['middleware'=>'auth', 'uses'=>'UsuarioController@eliminar']);
Route::get('verRutas/{id}',['middleware'=>'auth', 'uses'=>'InsertarRutaController@eliminar']);
Route::get('editarRuta/modificarRuta/{id}',['middleware'=>'auth', 'uses'=>'EditarRutaController@modificarRuta']);
Route::get('detallesRuta/verDetalles/{id}',['middleware'=>'auth', 'uses'=>'DetallesRutaController@verDetalles']);
Route::get('detallesRuta/unirRuta/{id}/{id_ruta}',['middleware'=>'auth', 'uses'=>'DetallesRutaController@Unirse']);
Route::get('viajes/{id}',['middleware'=>'auth', 'uses'=>'ViajesController@index']);
