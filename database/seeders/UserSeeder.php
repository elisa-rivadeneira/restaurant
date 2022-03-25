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
            'name'=> 'Admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('password')
            ])->assignRole('Admin');

        User::create([
            'name'=> 'Cocinero',
            'email'=> 'cocinero@cocinero.com',
            'password' => bcrypt('password')
        ])->assignRole('Cocinero');

        User::create([
            'name'=> 'Mozo',
            'email'=> 'mozo@mozo.com',
            'password' => bcrypt('password')
        ])->assignRole('Mozo');

        User::factory(9)->create();
    }
}
