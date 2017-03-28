<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto');
            $table->string('descripcion');
            $table->string('motivo');
            $table->string('institucion');
            $table->date('fecha_de_realizacion');
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
        Schema::dropIfExists('donaciones');
    }
}
