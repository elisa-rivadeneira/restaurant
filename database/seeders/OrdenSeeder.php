<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ordens')->insert([
            'mesa'=>'01',
            'status'=>'0',
            'total'=>'49'

        ]);

        DB::table('ordens')->insert([
            'mesa'=>'02',
            'status'=>'2',
            'total'=>'42',

        ]);
        DB::table('ordens')->insert([
            'mesa'=>'03',
            'status'=>'0',
            'total'=>'21',

        ]);

        DB::table('ordens')->insert([
            'mesa'=>'05',
            'status'=>'1',
            'total'=>'14',

        ]);

        DB::table('ordens')->insert([
            'mesa'=>'06',
            'status'=>'2',
            'total'=>'28'

        ]);

        DB::table('ordens')->insert([
            'mesa'=>'07',
            'status'=>'0',
            'total'=>'7',

        ]);

        DB::table('ordens')->insert([
            'mesa'=>'07',
            'status'=>'0',
            'total'=>'56',

        ]);

    }
}
