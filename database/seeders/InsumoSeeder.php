<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos')->insert([
            'nombre'=>'Arroz',
            'costo'=>'4',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Pollo',
            'costo'=>'7',
            'unidad'=>'kg',
            'cantidad'=>'0',
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Papa',
            'costo'=>'2',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Frejoles',
            'costo'=>'9',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Limon',
            'costo'=>'3',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Azucar',
            'costo'=>'4',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Fideos',
            'costo'=>'5',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Espinaca',
            'costo'=>'6',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Pimiento',
            'costo'=>'1',
            'unidad'=>'und',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Tomate',
            'costo'=>'1',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Cebolla',
            'costo'=>'2.5',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Leche',
            'costo'=>'3.00',
            'unidad'=>'lt',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Sillao',
            'costo'=>'4.00',
            'unidad'=>'lt',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Vinagre',
            'costo'=>'3.40',
            'unidad'=>'lt',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Aji Amarillo',
            'costo'=>'3.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Ajo',
            'costo'=>'9.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Lechuga',
            'costo'=>'1.00',
            'unidad'=>'und',
            'cantidad'=>'0',

        ]);
        DB::table('insumos')->insert([
            'nombre'=>'Col',
            'costo'=>'2.00',
            'unidad'=>'und',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Brocoli',
            'costo'=>'4.00',
            'unidad'=>'und',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Pepinos',
            'costo'=>'0.70',
            'unidad'=>'und',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Lentejas',
            'costo'=>'6.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Arverjitas',
            'costo'=>'4.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Garbanzos',
            'costo'=>'8.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Pallares',
            'costo'=>'9.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Queso',
            'costo'=>'18.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Pescado',
            'costo'=>'5.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);
        DB::table('insumos')->insert([
            'nombre'=>'Quinua',
            'costo'=>'9.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Carne de Res',
            'costo'=>'15.00',
            'unidad'=>'kg',
            'cantidad'=>'0',

        ]);

    }
}
