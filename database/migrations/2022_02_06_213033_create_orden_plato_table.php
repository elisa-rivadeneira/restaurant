<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenPlatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_plato', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('plato_id')->nullable();
            $table->float('cantidad');

            $table->timestamps();

            $table->foreign('plato_id')->references('id')->on('platos')->onDelete('cascade');
            $table->foreign('orden_id')->references('id')->on('ordens')->onDelete('cascade');


        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_plato');
    }
}
