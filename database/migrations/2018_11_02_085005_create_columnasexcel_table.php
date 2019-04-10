<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnasexcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnasexcel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',250);
            $table->string('descripcion',250);
            $table->integer('orden');
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
        Schema::dropIfExists('columnasexcel');
    }
}
