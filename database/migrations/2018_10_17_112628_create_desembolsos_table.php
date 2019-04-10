<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desembolsos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned()->nullable();
            $table->date('fecha')->nullable();
            $table->string('nro',10)->nullable();
            $table->double('monto')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('pago',2)->nullable();
            $table->string('slug')->unique();
            $table->timestamps();


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
        Schema::dropIfExists('desembolsos');
    }
}
