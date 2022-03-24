<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orden_menu')->insert([
            'orden_id'=>'1',
            'menu_id'=>'1',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_menu')->insert([
            'orden_id'=>'1',
            'menu_id'=>'3',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_menu')->insert([
            'orden_id'=>'1',
            'menu_id'=>'6',
            'cantidad'=>'1',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_menu')->insert([
            'orden_id'=>'2',
            'menu_id'=>'4',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_menu')->insert([
            'orden_id'=>'2',
            'menu_id'=>'5',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_menu')->insert([
            'orden_id'=>'3',
            'menu_id'=>'6',
            'cantidad'=>'3',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);


        DB::table('orden_menu')->insert([
            'orden_id'=>'4',
            'menu_id'=>'7',
            'cantidad'=>'2',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);


        DB::table('orden_menu')->insert([
            'orden_id'=>'5',
            'menu_id'=>'8',
            'cantidad'=>'4',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

        DB::table('orden_menu')->insert([
            'orden_id'=>'6',
            'menu_id'=>'9',
            'cantidad'=>'1',
            'estado'=>'0',
            'created_at'=>'2022-02-16 13:05:38',

        ]);

    }
}
