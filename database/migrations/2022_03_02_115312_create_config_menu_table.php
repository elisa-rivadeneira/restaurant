<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('config_id');
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('porciones');
            $table->timestamps();

            $table->foreign('config_id')->references('id')->on('configs')->onDelete('cascade');
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
        Schema::dropIfExists('config_menu');
    }
}
