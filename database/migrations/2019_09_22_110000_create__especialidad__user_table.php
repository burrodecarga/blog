<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('especialidad_id')->unsigned()->nullable();
            $table->foreign('especialidad_id')->references('id')->on('especialidades')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('_especialidad__user');
    }
}
