<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'nombre'=>'Arroz con Pollo',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Pescado frito con frejoles',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Bisteck con Lentejas',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'0'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Carapulcra',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Lomo Saltado',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Saltado de Brocoli',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'0'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Tallarines Verdes',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Garbanzos con Seco de Cordero',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Pavo al Horno',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'0'
        ]);

        DB::table('menus')->insert([
            'nombre'=>'Arverjitas con Papas Fritas',
            'precio'=>'9',
            'costo'=>'4',
            'status'=>'1'
        ]);
    }
}
