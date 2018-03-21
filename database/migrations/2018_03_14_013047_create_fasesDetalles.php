<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFasesDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasesDetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('home')->default(false);
            $table->boolean('visit')->default(false);
            $table->boolean('empate')->default(false);
            $table->integer('goles_home')->default(0);
            $table->integer('goles_visit')->default(0);
            $table->integer('id_fase')->unsigned();
            $table->integer('id_partido')->unsigned();
            $table->foreign('id_fase')
                  ->references('id')->on('fases')
                  ->onDelete('cascade');
            $table->foreign('id_partido')
                  ->references('id')->on('partidos')
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
        Schema::dropIfExists('fasesDetalles');
    }
}