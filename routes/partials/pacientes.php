<?php
///Importar pacientes desde Excel
/// Vaciar Tabla de Médicos
Route::get('/pacientes/formImportExcel','PacienteController@formImportExcel')->name('pacientes.formImportExcel');
Route::post('/pacientes/importExcel','PacienteController@importExcel')->name('pacientes.importExcel');
Route::post('/pacientes/borrarPacientes', 'PacienteController@vaciarpacientes')->name('pacientes.vaciarPacientes');
///pacientes Rutas
Route::get('/pacientes', 'PacienteController@index')->name('pacientes.index');
Route::post('/pacientes', 'PacienteController@store')->name('pacientes.store');
Route::get('/pacientes/create', 'PacienteController@create')->name('pacientes.create');
Route::get('/pacientes/{paciente}', 'PacienteController@show')->name('pacientes.show');
Route::put('/pacientes/{paciente}', 'PacienteController@update')->name('pacientes.update');
Route::delete('/pacientes/{paciente}', 'PacienteController@destroy')->name('pacientes.destroy');
Route::get('/pacientes/{paciente}/edit', 'PacienteController@edit')->name('pacientes.edit');
