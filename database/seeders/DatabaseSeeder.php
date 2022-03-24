<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MesaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(OrdenSeeder::class);
        $this->call(PlatoSeeder::class);
        $this->call(InsumoSeeder::class);
        $this->call(OrdenPlatoSeeder::class);
        $this->call(EntradaSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(OrdenMenuSeeder::class);
        $this->call(OrdenEntradaSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
