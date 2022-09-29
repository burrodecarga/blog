<?php
///Importar Especialidades desde Excel
/// Vaciar Tabla de Especialñidades
Route::get('/especialidades/formImportExcel','EspecialidadController@formImportExcel')->name('especialidades.formImportExcel');
Route::post('/especialidades/importExcel','EspecialidadController@importExcel')->name('especialidades.importExcel');
Route::post('/especialidades/borrarEspecialidades', 'EspecialidadController@vaciarEspecialidades')->name('especialidades.vaciarEspecialidades');
///Especialidades Rutas
Route::get('/especialidades', 'EspecialidadController@index')->name('especialidades.index');
Route::post('/especialidades', 'EspecialidadController@store')->name('especialidades.store');
Route::get('/especialidades/create', 'EspecialidadController@create')->name('especialidades.create');
Route::get('/especialidades/{especialidad}', 'EspecialidadController@show')->name('especialidades.show');
Route::put('/especialidades/{especialidad}', 'EspecialidadController@update')->name('especialidades.update');
Route::delete('/especialidades/{especialidad}', 'EspecialidadController@destroy')->name('especialidades.destroy');
Route::get('/especialidades/{especialidad}/edit', 'EspecialidadController@edit')->name('especialidades.edit');
