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
Route::get('/', 'homeController@index');


Route::get("/ejemplo", "ejemploController@index
	");

					//ALUMNOS
Route::get('/registrarAlumno', 'alumnosController@registrar');

Route::post('/guardarAlumno', 'alumnosController@guardar');

Route::get('/consultarAlumnos','alumnosController@consultar');

Route::get('/eliminarAlumno/{id}', 'alumnosController@eliminar');

Route::get('/editarAlumno/{id}', 'alumnosController@editar');

Route::post('/actualizarAlumno/{id}', 'alumnosController@actualizar');

				//MAESTROS
Route::get('/registrarMaestro', 'maestrosController@registrar');

Route::post('/guardarMaestro', 'maestrosController@guardar');

Route::get('/consultarMaestros','maestrosController@consultar');

Route::get('/eliminarMaestro/{id}', 'maestrosController@eliminar');

Route::get('/editarMaestro/{id}', 'maestrosController@editar');

Route::post('/actualizarMaestro/{id}', 'maestrosController@actualizar');

			//MATERIAS
Route::get('/registrarMateria', 'materiasController@registrar');

Route::post('/guardarMateria', 'materiasController@guardar');

Route::get('/consultarMaterias','materias@consultar');

Route::get('/eliminarMateria/{id}', 'materias@eliminar');

Route::get('/editarMateria/{id}', 'materias@editar');

Route::post('/actualizarMateria/{id}', 'materiasController@actualizar');
