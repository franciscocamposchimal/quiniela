<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpoDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpoDetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pj');
            $table->integer('pg');
            $table->integer('e');
            $table->integer('pp');
            $table->integer('gf');
            $table->integer('gc');
            $table->integer('pts');
            $table->integer('id_gpo')->unsigned();
            $table->integer('id_equipo')->unsigned();
            $table->foreign('id_gpo')
                  ->references('id')->on('grupos')
                  ->onDelete('cascade');
            $table->foreign('id_equipo')
                  ->references('id')->on('equipos')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('gpoDetalles');
    }
}
