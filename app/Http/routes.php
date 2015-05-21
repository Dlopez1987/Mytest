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

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('biblio.aprobado',['as'=>'biblio.aprobado','uses'=>'AprobadosController@update']);
Route::get('biblio.rechazado',['as'=>'biblio.rechazado','uses'=>'RechazadosController@update']);
Route::resource('consulta','ConsultaController');
Route::resource('buscar','BuscarController');
Route::get('biblio.consulta',['as'=>'biblio.consulta','uses'=>'ConsultaController@index']);
Route::get('biblio.buscar',['as'=>'biblio.buscar','uses'=>'BuscarController@buscar']);
