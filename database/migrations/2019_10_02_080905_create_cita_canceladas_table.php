<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaCanceladasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas_canceladas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cita_id')->unsigned()->nullable();
            $table->foreign('cita_id')->references('id')->on('citas');
            $table->bigInteger('cancelado_por_id')->unsigned()->nullable();
            $table->foreign('cancelado_por_id')->references('id')->on('users');
            $table->string('justificacion')->nullable();
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
        Schema::dropIfExists('cita_canceladas');
    }
}
