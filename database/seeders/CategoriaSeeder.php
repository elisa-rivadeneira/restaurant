<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'=>'bebidas'
           ]);

        DB::table('categorias')->insert([
            'nombre'=>'entradas'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'hamburguesas'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'jugos'
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'menu'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'plato a la carta'
        ]);

    }
}
