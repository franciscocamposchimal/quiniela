<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_gpodet_home')->unsigned();
            $table->integer('id_gpodet_visit')->unsigned();
            $table->foreign('id_gpodet_home')
                  ->references('id')->on('gpoDetalles')
                  ->onDelete('cascade');
            $table->foreign('id_gpodet_visit')
                  ->references('id')->on('gpoDetalles')
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
        Schema::dropIfExists('partidos');
    }
}