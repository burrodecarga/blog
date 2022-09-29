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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->namespace('Admin')->group(function(){
    include('partials/especialidades.php');
    include('partials/medicos.php');
    include('partials/pacientes.php');
});

Route::middleware(['auth','medico'])->namespace('Medico')->group(function(){
    include('partials/calendario.php');
   });

   Route::middleware(['auth'])->group(function(){
   Route::get('citas/create', 'CitaController@create')->name('citas.create');
   Route::get('citas/edit', 'CitaController@edit')->name('citas.edit');
   Route::post('citas/store', 'CitaController@store')->name('citas.store');
   Route::get('citas/index', 'CitaController@index')->name('citas.index');
   Route::post('citas/{cita}/cancelar', 'CitaController@cancelar')->name('citas.cancelar');
   Route::get('citas/{cita}/formCancelar', 'CitaController@formCancelar')->name('citas.formCancelar');
   Route::post('citas/{cita}/confirmar', 'CitaController@confirmar')->name('citas.confirmar');
   Route::get('citas/{cita}/show', 'CitaController@show')->name('citas.show');


   //JSON

   Route::get('especialidades/{especialidad}/medicos','Api\EspecialidadController@medicos')->name('especialidades.medicos');
   Route::get('calendario/horas','Api\CalendarioController@horas')->name('calendarios.horas');

   Route::get('charts/citas/medico','ChartsController@citasMedicos')->name('charts.citasMedicos');
   Route::get('charts/citas/citasJsonMedicos','ChartsController@citasJsonMedicos')->name('charts.citasJsonMedicos');
   Route::get('charts/citas/mes','ChartsController@citasMes')->name('charts.citasMes');
   Route::get('charts/citas/citasJsonMes','ChartsController@citasJsonMes')->name('charts.citasJsonMes');


   });

