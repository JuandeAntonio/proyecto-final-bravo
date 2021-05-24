<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();

            $table->integer('jornada');
            $table->date('fecha_partido');
            $table->string('hora_partido',5);
            $table->integer('resultado_equipo_local');
            $table->integer('resultado_equipo_visitante');
            $table->integer('sets_equipo_local');
            $table->integer('sets_equipo_visitante');
            $table->unsignedBigInteger('liga_id');
            $table->unsignedBigInteger('equipo_local_id');
            $table->unsignedBigInteger('equipo_visitante_id');
            $table->unsignedBigInteger('arbitros_id');

            $table->foreign('liga_id')->references('id')->on('ligas')->onDelete('cascade');
            $table->foreign('equipo_local_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('arbitros_id')->references('id')->on('arbitros');
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
        Schema::dropIfExists('partidos');
    }
}
