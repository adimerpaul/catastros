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
            DocumentoSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'=>'admin',
            'tipo'=>'Admin',
            'email'=>'admin@test.com',
            'unit_id'=>'1',
            'password'=>Hash::make('admin')]
        );
        DB::table('users')->insert([
            'name'=>'re',
            'tipo'=>'Recepcionista',
            'email'=>'re@test.com',
            'unit_id'=>'1',
            'password'=>Hash::make('re')]
        );
        
    }
}
