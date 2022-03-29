<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'dia'=>0000-00-00,
            'preciomenu'=>'0'

        ]);

        DB::table('configs')->insert([
            'dia'=>Carbon::now(),
            'preciomenu'=>'7'

        ]);
    }
}
