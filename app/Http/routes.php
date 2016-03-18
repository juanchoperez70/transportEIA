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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('verRutas', 'VerRutasController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'contacto' => 'ContactoController',
    'catalogo' => 'CatalogoController',
    'verRutas' => 'VerRutasController',
    'registro' => 'RegistroUsuarioController',
    'listado'  => 'ListadoController',
]);

Route::get('usuario','UsuarioController@index');
Route::get('usuario/listado','UsuarioController@listar');
Route::get('usuario/crear',['middleware'=>'auth', 'uses'=>'UsuarioController@crear']);
Route::post('usuario/crear',['middleware'=>'auth', 'uses'=>'UsuarioController@guardar']);
Route::get('usuario/ver/{id}',['middleware'=>'auth', 'uses'=>'UsuarioController@ver']);
Route::get('usuario/eliminar/{id}',['middleware'=>'auth', 'uses'=>'UsuarioController@eliminar']);