<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREACION DE DEFINICION DE LAS VARIABLES DE LA TABLA JUGADORES
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 45);
            $table->string('apellidos', 45);
            $table->integer('dorsal');
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
        Schema::dropIfExists('jugadors');
    }
}
