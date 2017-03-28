<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Configuracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->increments('id');
            $table->double('balance_general');
            $table->double('mensualidad_actual');
            $table->timestamps();
        });  

        DB::table('configuracion')->insert(
            array(
                'balance_general' => 2000000,
                'mensualidad_actual' => 500
            )
        );       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracion');
    }
}
