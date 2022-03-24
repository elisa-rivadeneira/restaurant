<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenEntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orden_entrada')->insert([
            'orden_id'=>'1',
            'entrada_id'=>'1',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'1',
            'entrada_id'=>'3',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'1',
            'entrada_id'=>'6',
            'cantidad'=>'1',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'2',
            'entrada_id'=>'4',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'2',
            'entrada_id'=>'5',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'3',
            'entrada_id'=>'6',
            'cantidad'=>'3',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);


        DB::table('orden_entrada')->insert([
            'orden_id'=>'4',
            'entrada_id'=>'7',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);


        DB::table('orden_entrada')->insert([
            'orden_id'=>'5',
            'entrada_id'=>'5',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'6',
            'entrada_id'=>'4',
            'cantidad'=>'1',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);
        DB::table('orden_entrada')->insert([
            'orden_id'=>'7',
            'entrada_id'=>'3',
            'cantidad'=>'8',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);
    }
}
