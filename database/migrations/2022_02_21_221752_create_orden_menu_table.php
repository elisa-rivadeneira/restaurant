<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->float('cantidad');
            $table->integer('estado');
            $table->timestamp('t_preparacion')->nullable();
            $table->timestamp('t_servido')->nullable();
            $table->timestamp('t_cobrado')->nullable();
            $table->timestamps();

            $table->foreign('orden_id')->references('id')->on('ordens')->onDelete('cascade');
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
        Schema::dropIfExists('orden_menu');
    }
}
