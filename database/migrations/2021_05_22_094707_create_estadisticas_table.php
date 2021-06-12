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
        //CREACION DE DEFINICION DE LAS VARIABLES DE LA TABLA ESTADISTICAS
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->integer('partidos_ganados');
            $table->integer('partidos_perdidos');
            $table->integer('sets_ganados');
            $table->integer('sets_perdidos');
            $table->integer('puntos');
            $table->unsignedBigInteger('equipo_id');

            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
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
