<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas')->insert([
            'nombre'=>'Ensalada de Palta',
            'status'=>'1',
            'costo'=>'1',

        ]);

        DB::table('entradas')->insert([
            'nombre'=>'Aguadito',
            'status'=>'0',
            'costo'=>'1'

        ]);

        DB::table('entradas')->insert([
            'nombre'=>'Tequeños',
            'status'=>'1',
            'costo'=>'1',
        ]);

        DB::table('entradas')->insert([
            'nombre'=>'Ceviche',
            'status'=>'0',
            'costo'=>'1',

        ]);

        DB::table('entradas')->insert([
            'nombre'=>'Papa a la Huancaina',
            'status'=>'1',
            'costo'=>'1'

        ]);

        DB::table('entradas')->insert([
            'nombre'=>'Ensalada Rusa',
            'status'=>'1',
            'costo'=>'1'

        ]);

        DB::table('entradas')->insert([
            'nombre'=>'Papa Rellena',
            'status'=>'1',
            'costo'=>'1'

        ]);


    }
}
