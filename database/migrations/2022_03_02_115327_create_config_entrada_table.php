<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_entrada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('config_id');
            $table->unsignedBigInteger('entrada_id');
            $table->unsignedBigInteger('porciones');
            $table->unsignedBigInteger('porcionesini');

            $table->timestamps();

            $table->foreign('config_id')->references('id')->on('configs')->onDelete('cascade');
            $table->foreign('entrada_id')->references('id')->on('entradas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_entrada');
    }
}
