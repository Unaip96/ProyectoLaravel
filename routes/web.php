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

Route::get('/formulario', 'ControladorUsuarios@cargarFormulario');

Route::post('/procesamiento', 'ControladorUsuarios@mostrarDatos');

Route::get('/insert', 'ControladorUsuarios@cargarFormularioInsert');

Route::post('/insertUsuario', 'ControladorUsuarios@insertUsuario');

Route::get('/', 'ControladorUsuarios@cargarCrud');

Route::get('/eliminar/{dni}', 'ControladorUsuarios@eliminarUsuario')->name('eliminar');

Route::get('/modificar/{dni}', 'ControladorUsuarios@modificar')->name('modificar');

Route::post('/modificarUsuario', 'ControladorUsuarios@modificarUsuario');


Route::get('/insertAula', 'ControladorUsuarios@cargarInsertAula');

Route::post('/insertAulaPost', 'ControladorUsuarios@insertAulaPost');

Route::get('/eliminarAula/{id}', 'ControladorUsuarios@eliminarAula')->name('eliminar');

Route::get('/modificarAula/{id}', 'ControladorUsuarios@modificarAula')->name('modificar');

Route::post('/modificarAulaPost', 'ControladorUsuarios@modificarAulaPost');
