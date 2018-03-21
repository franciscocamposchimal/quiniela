<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuinelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quinelas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('home')->default(false);
            $table->boolean('visit')->default(false);
            $table->boolean('empate')->default(false);
            $table->boolean('win');
            $table->integer('id_user')->unsigned();
            $table->integer('id_partido')->unsigned();
            $table->foreign('id_user')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('quinelas');
    }
}
