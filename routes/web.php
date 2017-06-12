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
    return view('app');
});



Route::get('/mensaje/{id}','MensajeController@getIndex');


Route::get('/formulario/app','FormularioController@getIndex');
Route::get('/formulario/mostrarforex/{id}','FormularioController@getMostrarformulario');

Route::get('/formulario/createconfigex/{id}','FormularioController@getCrearFormex');
Route::post('/formulario/storeconfigex','FormularioController@postCrearFormex');
Route::post('/formulario/storepregunta','ExclusivoController@postCrearPregunta');
Route::post('/formulario/storerespuesta','ExclusivoController@postCrearRespuesta');

Route::get('/formulario',function() {
	return view('dashboard');
});
