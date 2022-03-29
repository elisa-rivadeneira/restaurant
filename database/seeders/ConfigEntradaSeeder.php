<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigEntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config_entrada')->insert([
            'config_id'=>'2',
            'entrada_id'=>'6',
            'porciones'=>'38',
            'porcionesini'=>'43'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'2',
            'entrada_id'=>'2',
            'porciones'=>'11',
            'porcionesini'=>'25'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'2',
            'entrada_id'=>'5',
            'porciones'=>'63',
            'porcionesini'=>'64'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'2',
            'entrada_id'=>'1',
            'porciones'=>'60',
            'porcionesini'=>'64'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'2',
            'entrada_id'=>'4',
            'porciones'=>'36',
            'porcionesini'=>'38'

        ]);
    }
}
