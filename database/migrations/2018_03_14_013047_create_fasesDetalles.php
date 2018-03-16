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
            $table->boolean('home');
            $table->boolean('visit');
            $table->boolean('empate');
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