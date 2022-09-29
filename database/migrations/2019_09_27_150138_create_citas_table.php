<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id')->unsigned()->nullable();
            $table->foreign('paciente_id')->references('id')->on('users');
            $table->bigInteger('medico_id')->unsigned()->nullable();
            $table->foreign('medico_id')->references('id')->on('users');
            $table->bigInteger('especialidad_id');
            $table->date('fechaDeCita');
            $table->time('horaDeCita');
            $table->string('tipo')->default('Consulta');
            $table->string('condicion')->default('Reservado');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
