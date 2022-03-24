<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenPlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orden_plato')->insert([
            'orden_id'=>'1',
            'plato_id'=>'8',
            'cantidad'=>'4',
            'created_at'=>'2022-02-16 13:05:38',

        ]);
        DB::table('orden_plato')->insert([
            'orden_id'=>'1',
            'plato_id'=>'7',
            'cantidad'=>'4',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'2',
            'plato_id'=>'7',
            'cantidad'=>'3',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'2',
            'plato_id'=>'8',
            'cantidad'=>'3',
            'created_at'=>'2022-02-16 14:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'2',
            'plato_id'=>'4',
            'cantidad'=>'3',
            'created_at'=>'2022-02-16 14:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'3',
            'plato_id'=>'7',
            'cantidad'=>'2',
            'created_at'=>'2022-02-16 11:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'3',
            'plato_id'=>'3',
            'cantidad'=>'2',
            'created_at'=>'2022-02-16 11:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'3',
            'plato_id'=>'4',
            'cantidad'=>'2',
            'created_at'=>'2022-02-16 11:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'3',
            'plato_id'=>'4',
            'cantidad'=>'2',
            'created_at'=>'2022-02-16 11:05:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'4',
            'plato_id'=>'6',
            'cantidad'=>'4',
            'created_at'=>'2022-02-16 13:03:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'5',
            'plato_id'=>'7',
            'cantidad'=>'4',
            'created_at'=>'2022-02-16 15:03:38',

        ]);
        DB::table('orden_plato')->insert([
            'orden_id'=>'5',
            'plato_id'=>'3',
            'cantidad'=>'6',
            'created_at'=>'2022-02-16 15:03:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'6',
            'plato_id'=>'4',
            'cantidad'=>'6',
            'created_at'=>'2022-02-16 16:03:38',

        ]);

        DB::table('orden_plato')->insert([
            'orden_id'=>'6',
            'plato_id'=>'1',
            'cantidad'=>'6',
            'created_at'=>'2022-02-16 16:03:38',

        ]);
    }
}
