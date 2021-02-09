<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
            [
                'nombre'=>'juan ',
                'apellidos'=>'calle ',
                'ci'=>'1010',
                'celular'=>'1010',
                'direccion'=>'calle x'
            ],
            [
                'nombre'=>'fabiola ',
                'apellidos'=>'ramirez ',
                'ci'=>'2020',
                'celular'=>'69603027',
                'direccion'=>'calle y'
            ]
        ]);
    }
}
