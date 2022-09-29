<?php
Route::get('calendario/edit', 'CalendarioController@edit')->name('calendario.edit');
Route::post('calendario/store', 'CalendarioController@store')->name('calendario.store');
