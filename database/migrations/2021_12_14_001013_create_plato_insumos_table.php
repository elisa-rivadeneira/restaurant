<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatoInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plato_insumos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('insumo_id');
            $table->unsignedBigInteger('plato_id');
            $table->float('cantidad');
            $table->timestamps();


            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->foreign('plato_id')->references('id')->on('platos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plato_insumos');
    }
}
