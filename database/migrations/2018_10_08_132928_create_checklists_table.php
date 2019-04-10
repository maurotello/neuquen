<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nota_oficial',3);
            $table->string('solicitud_financiamiento',3);
            $table->string('fotocopia_dni',3);
            $table->string('certificado_domicilio',3);
            $table->string('inscripcion_afip_rentas',3);
            $table->string('estado_civil',3);
            $table->string('ddjj',3);
            $table->string('nota_banco',3);
            $table->string('respuesta_banco',3);
            $table->string('titulo_propiedad_inmuebles',3);
            $table->string('habilitaciones',3);
            $table->string('titulo_propiedad_muebles',3);
            $table->string('proformas',3);
            $table->string('guia_proyecto',3);
            $table->string('estadisticas',3);
            $table->string('promeva',3);
            $table->string('informe_uep',3);
            $table->integer('user_id')->unsigned();
            $table->integer('proyecto_id')->unsigned();
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
        Schema::dropIfExists('checklists');
    }
}
