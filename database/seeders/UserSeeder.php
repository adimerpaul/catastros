<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'unit_id'=>'10',
                'password'=>Hash::make('re')]
        );
        DB::table('users')->insert([
                'name'=>'re2',
                'tipo'=>'Recepcionista',
                'email'=>'re2@test.com',
                'unit_id'=>'2',
                'password'=>Hash::make('re')]
        );

    }
}
