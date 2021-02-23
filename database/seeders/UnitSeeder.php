<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'unidad'=>'STRIA. MCPAL DE ECON. Y HACIENDA'
            ],
            [
                'unidad'=>'DIRECCION DE TRIB. Y RECAUD.'
            ],
            [
                'unidad'=>'DIRECCION DEL TESORO MUNICIPAL'
            ],
            [
                'unidad'=>'BIENES Y SERVICIO '
            ],
            [
                'unidad'=>'DIRECCION Y DESARR. ECON.LOCAL'
            ],
            [
                'unidad'=>'DEFENZA DEL CONSUMIDOR'
            ],
            [
                'unidad'=>'MERCADOS'
            ],
            [
                'unidad'=>'ACTIVIDADES ECONOMICAS'
            ],
            [
                'unidad'=>'ESPECTACULOS PUBLI. Y PUBLI.URBANA'
            ],
            [
                'unidad'=>'VENTANILLA UNICA'
            ],
            [
                'unidad'=>'VALORES MUNICIPALES'
            ],
            [
                'unidad'=>'ASISTENTE'
            ],
            [
                'unidad'=>'SECRETARIA'
            ],
            ]);
         }
}
