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
    return view('index');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Rutas Discplina
Route::get('/disciplina','DisciplinaController@index');
Route::post('/disciplina/registrar', 'DisciplinaController@store');
Route::get('/disciplina/selectDisciplina','DisciplinaController@selectDisciplina');
//Rutas Cliente
Route::get('/cliente','ClienteController@index');
Route::post('/cliente/registrar', 'ClienteController@store');
Route::put('/cliente/modificar','ClienteController@update');
Route::put('/cliente/eliminar','ClienteController@delete');
Route::get('/cliente/selectCliente','ClienteController@selectCliente');
//Rutas Horario
Route::get('/horario','HorarioController@index');
Route::post('/horario/registrar', 'HorarioController@store');
Route::put('/horario/modificar', 'HorarioController@update');
Route::put('/horario/eliminar', 'HorarioController@delete');
//Rutas Administrador
Route::get('/administrador','AdministradorController@index');
Route::post('/administrador/registrar', 'AdministradorController@store');
Route::put('/administrador/modificar','AdministradorController@update');
Route::put('/administrador/eliminar','AdministradorController@delete');
//Route::get('/administrador/selectAdministrador','AdministradorController@selectAdministrador');
//Rutas Tipoinscripcion
Route::get('/tipoinscripcion','TipoinscripcionController@index');
Route::post('/tipoinscripcion/registrar', 'TipoinscripcionController@store');
Route::put('/tipoinscripcion/modificar','TipoinscripcionController@update');
Route::put('/tipoinscripcion/eliminar','TipoinscripcionController@delete');
//Route::get('/tipoinscripcion/selectAdministrador','TipoinscripcionController@selectTipoinscripcion');
//Rutas Notainscripcion
Route::get('/notainscripcion','NotainscripcionController@index');
Route::post('/notainscripcion/registrar', 'NotainscripcionController@store');
Route::put('/notainscripcion/modificar','NotainscripcionController@update');
Route::put('/notainscripcion/eliminar','NotainscripcionController@delete');
//Route::get('/tipoinscripcion/selectAdministrador','TipoinscripcionController@selectTipoinscripcion');
//Rutas Entrenador
Route::get('/entrenador','EntrenadorController@index');
Route::post('/entrenador/registrar', 'EntrenadorController@store');
Route::put('/entrenador/modificar','EntrenadorController@update');
Route::put('/entrenador/eliminar','EntrenadorController@delete');
Route::get('/entrenador/selectEntrenador','EntrenadorController@selectEntrenador');
//Rutas Paquetes
Route::get('/paquete','PaqueteController@index');
Route::post('/paquete/registrar', 'PaqueteController@store');
Route::put('/paquete/modificar', 'PaqueteController@update');
Route::put('/paquete/eliminar', 'PaqueteController@delete');
