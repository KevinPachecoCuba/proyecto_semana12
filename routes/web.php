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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('citas', 'CitaController');
Route::resource('doctors', 'DoctorController');
Route::resource('pacientes', 'PacienteController');
Route::resource('usuarios', 'UsuarioController');
Route::resource('citaDetalles', 'Cita_detalleController');


Route::get('/tareas', 'VuecitaController@lista');
Route::put('/tareas/actualizar', 'VuecitaController@update');
Route::post('/tareas/guardar', 'VuecitaController@store');
Route::delete('/tareas/borrar/{idcita}', 'VuecitaController@destroy');
Route::get('/tareas/buscar', 'VuecitaController@show');
Route::resource('vuecita', 'VuecitaController');

Route::get('/tareas', 'VuedoctorController@lista');
Route::put('/tareas/actualizar', 'VuedoctorController@update');
Route::post('/tareas/guardar', 'VuedoctorController@store');
Route::delete('/tareas/borrar/{iddoctor}', 'VuedoctorController@destroy');
Route::get('/tareas/buscar', 'VuedoctorController@show');
Route::resource('vuedoctor', 'VuedoctorController');

Route::get('/tareas', 'VuepacienteController@lista');
Route::put('/tareas/actualizar', 'VuepacienteController@update');
Route::post('/tareas/guardar', 'VuepacienteController@store');
Route::delete('/tareas/borrar/{idpaciente}', 'VuepacienteController@destroy');
Route::get('/tareas/buscar', 'VuepacienteController@show');
Route::resource('vuepaciente', 'VuepacienteController');

Route::get('/tareas', 'VueusuarioController@lista');
Route::put('/tareas/actualizar', 'VueusuarioController@update');
Route::post('/tareas/guardar', 'VueusuarioController@store');
Route::delete('/tareas/borrar/{idusuario}', 'VueusuarioController@destroy');
Route::get('/tareas/buscar', 'VueusuarioController@show');
Route::resource('vueusuario', 'VueusuarioController');

Route::get('/tareas', 'Vuecita_detalleController@lista');
Route::put('/tareas/actualizar', 'Vuecita_detalleController@update');
Route::post('/tareas/guardar', 'Vuecita_detalleController@store');
Route::delete('/tareas/borrar/{idcita_detalle}', 'Vuecita_detalleController@destroy');
Route::get('/tareas/buscar', 'Vuecita_detalleController@show');
Route::resource('vuecita_detalle', 'Vuecita_detalleController');





