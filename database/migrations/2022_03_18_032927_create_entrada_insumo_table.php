<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_insumo', function (Blueprint $table) {

                    $table->id();

                    $table->unsignedBigInteger('insumo_id');
                    $table->unsignedBigInteger('entrada_id');
                    $table->float('cantidad');
                    $table->timestamps();

                    $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
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
        Schema::dropIfExists('entrada_insumo');
    }
}
