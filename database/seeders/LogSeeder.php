<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logs')->insert([
            'documento_id'=>'1',
            'unit_id1'=>'10',
            'unit_id2'=>'1',
            'user_id'=>'2',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
