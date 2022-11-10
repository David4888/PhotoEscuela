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
    {   //Llamamos a todos los seeders
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FotoSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
