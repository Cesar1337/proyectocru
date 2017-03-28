<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AbonosMensualidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos_mensualidades', function (Blueprint $table) {
            $table->increments('id');
            $table->float('monto_abonado');
            $table->integer('miembro_id')->unsigned();
            $table->string('mes_correspondiente');
            $table->integer('anio_correspondiente');
            $table->timestamps();
        });

        Schema::table('abonos_mensualidades', function($table) {
            $table->foreign('miembro_id')->references('id')->on('cms_users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos_mensualidades');
    }
}
