<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Victor Arana Flores',
            'email'=> 'victor.aranaf92@gmail.com',
            'password' => bcrypt('123456')
            ])->assignRole('Admin');

        User::create([
            'name'=> 'Rony Vega Santos',
            'email'=> 'rony.vega@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Cocinero');

        User::factory(9)->create();
    }
}
