<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('cp');
            $table->integer('provincia_id')->unsigned();
            $table->integer('zona_id')->unsigned();
            $table->integer('dpto_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('dpto_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidades');
    }
}
