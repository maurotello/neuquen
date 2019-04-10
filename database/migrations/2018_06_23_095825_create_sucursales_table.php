<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banco_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('localidad_id')->unsigned();
            $table->string('nombre')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('contacto');
            $table->string('gerente');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
