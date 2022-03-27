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
            'config_id'=>'1',
            'entrada_id'=>'6',
            'porciones'=>'43',
            'porcionesini'=>'43'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'1',
            'entrada_id'=>'2',
            'porciones'=>'25',
            'porcionesini'=>'25'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'1',
            'entrada_id'=>'5',
            'porciones'=>'64',
            'porcionesini'=>'64'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'1',
            'entrada_id'=>'1',
            'porciones'=>'64',
            'porcionesini'=>'64'

        ]);

        DB::table('config_entrada')->insert([
            'config_id'=>'1',
            'entrada_id'=>'4',
            'porciones'=>'38',
            'porcionesini'=>'38'

        ]);
    }
}
