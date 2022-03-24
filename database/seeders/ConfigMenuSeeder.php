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
            'config_id '=>'1',
            'menu_id'=>'4',
            'porciones'=>'34'

        ]);

       DB::table('config_menu')->insert([
                   'config_id '=>'1',
                   'menu_id'=>'7',
                    'porciones'=>'56'

        ]);

        DB::table('config_menu')->insert([
            'config_id '=>'1',
            'menu_id'=>'8',
            'porciones'=>'21'

        ]);

        DB::table('config_menu')->insert([
            'config_id '=>'1',
            'menu_id'=>'2',
            'porciones'=>'32'

        ]);

        DB::table('config_menu')->insert([
            'config_id '=>'1',
            'menu_id'=>'9',
            'porciones'=>'46'

        ]);
    }
}
