<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('medico')->nullable();
            $table->integer('especialidad_id')->unsigned();
            $table->string('especialidad')->nullable();
            $table->integer('mes')->unsigned()->nullable();
            $table->integer('reservadas')->unsigned()->nullable();
            $table->integer('atendidas')->unsigned()->nullable();
            $table->integer('confirmadas')->unsigned()->nullable();
            $table->integer('canceladas')->unsigned()->nullable();
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
        Schema::dropIfExists('estadisticas');
    }
}
