<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mesas')->insert([
            'numero'=>'01',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'02',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'03',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'04',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'05',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'06',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);
        DB::table('mesas')->insert([
            'numero'=>'07',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'08',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
            'numero'=>'09',
            'estado'=>'0',
            'sucursal'=>'chimu',
            'piso'=>'01',
        ]);

        DB::table('mesas')->insert([
        'numero'=>'10',
        'estado'=>'0',
        'sucursal'=>'chimu',
        'piso'=>'01',
    ]);



    }
}
