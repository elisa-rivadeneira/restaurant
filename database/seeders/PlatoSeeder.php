<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('platos')->insert([
            'nombre'=>' ',
            'categoria_id'=>'1',
            'precio'=>'1.00',
            'status'=>'1',

        ]);
        DB::table('platos')->insert([
            'nombre'=>' ',
            'categoria_id'=>'6',
            'precio'=>'9.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Arroz con Pollo',
            'categoria_id'=>'6',
            'precio'=>'9.00',
            'status'=>'0',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Pescado Frito con Frejoles',
            'categoria_id'=>'6',
            'precio'=>'9.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Lomo Saltado Grande',
            'categoria_id'=>'6',
            'precio'=>'9.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Arroz Chaufa con Mariscos',
            'categoria_id'=>'6',
            'precio'=>'15.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Fetucchini',
            'categoria_id'=>'6',
            'precio'=>'10.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Pallares con Chicharron de Pescado',
            'categoria_id'=>'6',
            'precio'=>'9.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Arroz con Leche',
            'categoria_id'=>'6',
            'precio'=>'5.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Arroz Zambito',
            'categoria_id'=>'6',
            'precio'=>'5.00',
            'status'=>'0',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Mazamorra Morada',
            'categoria_id'=>'6',
            'precio'=>'5.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Carapulcra',
            'categoria_id'=>'6',
            'precio'=>'12.00',
            'status'=>'1',


        ]);



        DB::table('platos')->insert([
            'nombre'=>'Limonada',
            'categoria_id'=>'1',
            'precio'=>'1.00',
            'status'=>'1',

        ]);

        DB::table('platos')->insert([
            'nombre'=>'Chicha Morada',
            'categoria_id'=>'1',
            'precio'=>'2.00',
            'status'=>'0',

        ]);

        DB::table('platos')->insert([
            'nombre'=>'Te Verde',
            'categoria_id'=>'1',
            'precio'=>'2.00',
            'status'=>'1',

        ]);


        DB::table('platos')->insert([
            'nombre'=>'Refresco de Cebada',
            'categoria_id'=>'1',
            'precio'=>'1.00',
            'status'=>'1',


        ]);



        DB::table('platos')->insert([
            'nombre'=>'Cafe',
            'categoria_id'=>'1',
            'precio'=>'3.00',
            'status'=>'0',


        ]);



        DB::table('platos')->insert([
            'nombre'=>'Sopa de Pollo',
            'categoria_id'=>'2',
            'precio'=>'5.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Ensalada de Palta',
            'categoria_id'=>'2',
            'precio'=>'5.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Tequeños',
            'categoria_id'=>'2',
            'precio'=>'5.00',
            'status'=>'1',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Causa Limeña',
            'categoria_id'=>'2',
            'precio'=>'5.00',
            'status'=>'0',


        ]);

        DB::table('platos')->insert([
            'nombre'=>'Papa Rellena',
            'categoria_id'=>'2',
            'precio'=>'5.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>' ',
            'categoria_id'=>'3',
            'precio'=>'7.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Hamburguesa Clasica',
            'categoria_id'=>'3',
            'precio'=>'7.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Hamburguesa Doble',
            'categoria_id'=>'3',
            'precio'=>'10.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>' ',
            'categoria_id'=>'4',
            'precio'=>'5.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Papaya con Leche',
            'categoria_id'=>'4',
            'precio'=>'5.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Jugo Tutifruti',
            'categoria_id'=>'4',
            'precio'=>'5.00',
            'status'=>'1',
        ]);

        DB::table('platos')->insert([
            'nombre'=>'Fresa con Leche',
            'categoria_id'=>'4',
            'precio'=>'5.00',
            'status'=>'1',
        ]);
    }
}
