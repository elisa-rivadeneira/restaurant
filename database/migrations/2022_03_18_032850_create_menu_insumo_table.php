<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_insumo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('insumo_id');
            $table->unsignedBigInteger('menu_id');
            $table->float('cantidad');
            $table->timestamps();


            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_insumo');
    }
}
