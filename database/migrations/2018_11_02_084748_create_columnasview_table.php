<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnasviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnasview', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',250);
            $table->string('descripcion',250);
            $table->integer('orden',10);
            $table->string('seleccionada',3);
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
        Schema::dropIfExists('columnasview');
    }
}
