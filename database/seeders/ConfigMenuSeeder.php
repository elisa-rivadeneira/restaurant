<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('config_menu')->insert([
            'config_id'=>'2',
            'menu_id'=>'4',
            'porciones'=>'25',
            'porcionesini'=>'34'

        ]);

       DB::table('config_menu')->insert([
                   'config_id'=>'2',
                   'menu_id'=>'7',
                    'porciones'=>'49',
                    'porcionesini'=>'56'

        ]);

        DB::table('config_menu')->insert([
            'config_id'=>'2',
            'menu_id'=>'8',
            'porciones'=>'16',
            'porcionesini'=>'21'

        ]);

        DB::table('config_menu')->insert([
            'config_id'=>'2',
            'menu_id'=>'2',
            'porciones'=>'31',
            'porcionesini'=>'32'

        ]);

        DB::table('config_menu')->insert([
            'config_id'=>'2',
            'menu_id'=>'9',
            'porciones'=>'42',
            'porcionesini'=>'46'

        ]);
    }
}
