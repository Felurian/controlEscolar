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


Route::get("/ejemplo", "ejemploController@index");

					//ALUMNOS
Route::get('/registrarAlumno', 'alumnosController@registrar');

Route::post('/guardarAlumno', 'alumnosController@guardar');

Route::get('/consultarAlumnos','alumnosController@consultar');

Route::get('/eliminarAlumno/{id}', 'alumnosController@eliminar');

Route::get('/editarAlumno/{id}', 'alumnosController@editar');

Route::get('/pdfAlumnos', 'alumnosController@pdf');


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

Route::get('/consultarMaterias','materiasController@consultar');

Route::get('/eliminarMateria/{id}', 'materiasController@eliminar');

Route::get('/editarMateria/{id}', 'materiasController@editar');

Route::post('/actualizarMateria/{id}', 'materiasController@actualizar');

			//GRUPOS
Route::get('/registrarGrupo', 'gruposController@registrar');

Route::post('/guardarGrupo', 'gruposController@guardar');

Route::get('/consultarGrupos','gruposController@consultar');

Route::get('/eliminarGrupo/{id}', 'gruposController@eliminar');

Route::get('/editarGrupo/{id}', 'gruposController@editar');

Route::post('/actualizarGrupo/{id}', 'gruposController@actualizar');

Route::get('/detalleGrupo/{id}', 'gruposController@detalleGrupo');

Route::get('/eliminarAlumnoGrupo/{group_id}/{alumno_id}', 'gruposController@eliminarAlumno');

Route::get('/agregarAlumnoGrupo/{id}', 'gruposController@agregarAlumno');

Route::get('/guardarAlumnoGrupo/{grupo_id}/{alumno_id}', 'gruposController@guardarAlumno');


