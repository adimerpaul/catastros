<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('PROCESO');
            $table->unsignedBigInteger('unit_id1');
            $table->foreign('unit_id1')->references('id')->on('units');
            $table->unsignedBigInteger('unit_id2');
            $table->foreign('unit_id2')->references('id')->on('units');
            $table->unsignedBigInteger('documento_id');
            $table->foreign('documento_id')->references('id')->on('documentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
