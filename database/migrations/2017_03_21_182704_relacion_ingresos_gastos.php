<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionIngresosGastos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_ingresos_gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_cierre');
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
        Schema::dropIfExists('relacion_ingresos_gastos');
    }
}
