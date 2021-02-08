<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisitos')->insert([
            [
                'nombre'=>'REQUISITOS PARA PAGO IMPUESTOS A LA TRANSFERENCIA'
            ],
            [
                'nombre'=>'REQUISITOS PARA LA LEGALIZACION DE PLANO DEMOSTRATIVO'
            ],
            [
                'nombre'=>'REQUISITOS PARA CERTIFICACION GENERAL O INFORME TECNICO'
            ],
            [
                'nombre'=>'REQUISITOS PARA CERTIFICADO CATASTRAL Y PRESTAMO BANCARIO '
            ],
            [
                'nombre'=>'REQUISITOS PARA EMPADRONAMIENTO Y CAMBIO DE NOMBRE'
            ],
            [
                'nombre'=>'REQUISITOS PARA RECATASTRACION'
            ],
            [
                'nombre'=>'REQUISITOS PARA REGULACION DE IMPUESTOS'
            ],
            [
                'nombre'=>'REQUISITOS PARA TRAMITES DE EXCEDENCIA'
            ],
            [
                'nombre'=>'REQUISITOS APROBACION DE PLANOS DE CONSTRUCCION'
            ],
            [
                'nombre'=>'REQUISITOS LINEA NIVEL Y ORDEN DE AMURALLAMIENTO'
            ],
            [
                'nombre'=>'REQUISITOS PARA APROBACION DE PLANO DE FRACCIONAMIENTO'
            ],
            [
                'nombre'=>'REQUISITOS APROBACION PLANOS DE UNIFICACION'
            ], 
            [
                'nombre'=>'APROBACION DE PLANO DEMOSTRATIVO INDIVIDUAL'
            ],
            [
                'nombre'=>'APROBACION PLANOS EN PROPIEDAD HORIZONTAL'
            ],
        ]);
    }
}
