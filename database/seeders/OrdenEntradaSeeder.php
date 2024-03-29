<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'entrada_id'=>'6',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at' => Carbon::now(),

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'1',
            'entrada_id'=>'2',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at' => Carbon::now(),

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'1',
            'entrada_id'=>'5',
            'cantidad'=>'1',
            'estado'=>'0',
            'created_at' => Carbon::now(),

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'2',
            'entrada_id'=>'1',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at' => Carbon::now(),

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'2',
            'entrada_id'=>'4',
            'cantidad'=>'3',
            'estado'=>'0',
            'created_at' => Carbon::now(),

        ]);

        DB::table('orden_entrada')->insert([
            'orden_id'=>'7',
            'entrada_id'=>'4',
            'cantidad'=>'42',
            'estado'=>'0',
            'created_at' => Carbon::now(),

        ]);

    }
}
