<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->biginteger('mesa')->unsigned();
            $table->decimal('total', 8, 2)->nullable();
            $table->biginteger('status');
            $table->timestamp('tiempo_despacho')->nullable();
            $table->timestamp('tiempo_cobro')->nullable();
            $table->foreign('mesa')->references('id')->on('mesas');
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
        Schema::dropIfExists('ordens');
    }
}
