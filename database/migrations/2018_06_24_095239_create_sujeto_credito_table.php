<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSujetoCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujeto_credito', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('fecha_envio_banco');
            $table->date('fecha_respuesta_banco');
            $table->string('sujeto_credito');
            $table->text('descipcion');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->foreign('sucursal_id')->references('id')->on('sucursales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sujeto_credito');
    }
}
