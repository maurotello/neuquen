<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titular', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apeynom');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('dni',8)->nullable();
            $table->string('cuit',13)->nullable();
            $table->string('domicilioLegal')->nullable();
            $table->string('telefono',50)->nullable();
            $table->string('mail',100)->nullable();
            $table->integer('estado_civil_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('proyecto_id')->unsigned();
            $table->integer('localidad_id')->unsigned()->nullable();
            $table->string('apeynom_conyuge')->nullable();
            $table->string('dni_conyuge',8)->nullable();
            $table->string('telefono_conyuge',50)->nullable();
            $table->string('cuit_conyuge',13)->nullable();
            $table->date('fecha_nacimiento_conyuge')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();


            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles');

        });
    }
  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titular');
    }
}
