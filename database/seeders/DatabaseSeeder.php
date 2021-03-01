<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            RequisitoSeeder::class,
            DetalleSeeder::class,
            PersonaSeeder::class,
            UnitSeeder::class,
            UserSeeder::class,
            DocumentoSeeder::class,
            LogSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

    }
}
