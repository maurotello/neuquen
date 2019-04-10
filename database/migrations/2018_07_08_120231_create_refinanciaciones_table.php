<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefinanciacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('refinanciaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('proyecto_id')->unsigned();
            $table->date('fecha');
            $table->integer('nroResolucion');
            $table->double('montoRefinanciar');
            $table->double('tasa');
            $table->text('descripcion');
            $table->integer('plazoGracia');
            $table->integer('plazoAmortizacion');
            $table->string('slug')->unique();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refinanciaciones');
    }
}
