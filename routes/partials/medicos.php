<?php
///Importar medicos desde Excel
/// Vaciar Tabla de Médicos
Route::get('/medicos/formImportExcel','MedicoController@formImportExcel')->name('medicos.formImportExcel');
Route::post('/medicos/importExcel','MedicoController@importExcel')->name('medicos.importExcel');
Route::post('/medicos/borrarmedicos', 'MedicoController@vaciarmedicos')->name('medicos.vaciarmedicos');
///medicos Rutas
Route::get('/medicos', 'MedicoController@index')->name('medicos.index');
Route::post('/medicos', 'MedicoController@store')->name('medicos.store');
Route::get('/medicos/create', 'MedicoController@create')->name('medicos.create');
Route::get('/medicos/{especialidad}', 'MedicoController@show')->name('medicos.show');
Route::put('/medicos/{especialidad}', 'MedicoController@update')->name('medicos.update');
Route::delete('/medicos/{especialidad}', 'MedicoController@destroy')->name('medicos.destroy');
Route::get('/medicos/{especialidad}/edit', 'MedicoController@edit')->name('medicos.edit');
