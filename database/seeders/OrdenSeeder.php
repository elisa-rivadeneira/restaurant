<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'total'=>'49',
            'created_at' => Carbon::now(),


        ]);

        DB::table('ordens')->insert([
            'mesa'=>'02',
            'status'=>'2',
            'total'=>'42',
            'created_at' => Carbon::now(),


        ]);
        DB::table('ordens')->insert([
            'mesa'=>'03',
            'status'=>'0',
            'total'=>'21',
            'created_at' => Carbon::now(),


        ]);

        DB::table('ordens')->insert([
            'mesa'=>'05',
            'status'=>'1',
            'total'=>'14',
            'created_at' => Carbon::now(),


        ]);

        DB::table('ordens')->insert([
            'mesa'=>'06',
            'status'=>'2',
            'total'=>'28',
            'created_at' => Carbon::now(),


        ]);

        DB::table('ordens')->insert([
            'mesa'=>'07',
            'status'=>'0',
            'total'=>'7',
            'created_at' => Carbon::now(),


        ]);

        DB::table('ordens')->insert([
            'mesa'=>'07',
            'status'=>'0',
            'total'=>'56',
            'created_at' => Carbon::now(),


        ]);

    }
}
