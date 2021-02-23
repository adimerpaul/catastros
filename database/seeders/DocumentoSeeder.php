<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documentos')->insert([
                'codigounidad'=>'206-4',
                'nroHojas'=>'10',
                'persona_id'=>'1',
                'unit_id'=>'1',
                'requisito_id'=>'1',
                'created_at'=>now(),
                'updated_at'=>now()
        ]);

        /*$table->string('codigounidad');
            $table->string('instruccion');
            //$table->string('referencia');
            $table->integer('nroHojas');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('units');
            $table->unsignedBigInteger('requisito_id');
            $table->foreign('requisito_id')->references('id')->on('requisitos');
            */
    }
}
