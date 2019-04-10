<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaIngreso');
            $table->string('nombre');
            $table->string('numeroInterno')->unique();
            $table->string('numeroCfi')->unique();
            $table->integer('localidad_id')->unsigned();
            $table->integer('lineaCredito_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('estadoInterno_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->string('titular');
            $table->double('monto');
            $table->string('tamanio')->nullable();
            $table->string('tipo')->nullable(); // Ampliación o Nuevo
            $table->string('domicilioProyecto')->nullable();
            $table->string('domicilioLegal')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('productos')->nullable();
            $table->string('ciuu')->nullable();
            $table->string('mo')->nullable();
            $table->string('enuep')->nullable()->default(0);
            $table->text('descripcion')->nullable();

            $table->double('inversionTotal')->nullable();
            $table->double('inversionRealizada')->nullable();
            $table->double('inversionARealizar_ct')->nullable();
            $table->double('inversionARealizar_af')->nullable();

            $table->integer('figuraLegal_id')->unsigned();
            $table->integer('periodicidad_id')->unsigned();
            $table->integer('destinoCredito_id')->unsigned();
            $table->integer('refinanciado')->nullable()->default(0);

            $table->integer('plazoGracia')->nullable();
            $table->integer('plazoAmortizacion')->nullable();
            $table->integer('cantidadDesembolsos')->nullable()->default(1);
            $table->double('tasa')->nullable();
            $table->integer('garantia_id')->unsigned();
            $table->text('descripcionGarantia');

            //Envio y recepcion del banco

            //$table->integer('sujetoCredito_id')->unsigned();
            $table->integer('sujetoCredito')->nullable(); // este campo es para facilitar los filtros y demas tiene 1 o 0 segun la tabla de sujeto de creditos
            $table->date('fechaEnvioBanco')->nullable();
            $table->date('fechaRespuestaBanco')->nullable();
            $table->date('fechaCaducoBanco')->nullable();
            $table->date('fechaAprobadoUep')->nullable();
            $table->date('fechaEnviadoCfi')->nullable();
            $table->date('fechaAprobadoCfi')->nullable();// REMIRESOL
            $table->date('fechaTramdispo')->nullable();;
            $table->date('fechaComunicaTran')->nullable();
            $table->date('fechaDesembolso')->nullable();
            $table->date('fechaEfectivizacion')->nullable();
            $table->date('fechaDesistido')->nullable();


            //$table->integer('refinanciacion_id')->unsigned();

            $table->date('fechaJudicial')->nullable();
            $table->date('fechaCancelado')->nullable();
            $table->date('fechaArchivado')->nullable();
            $table->date('fechaUltimoMovimiento')->nullable();

            $table->text('observaciones')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sucursal_id')->references('id')->on('sucursales');
            $table->foreign('figuraLegal_id')->references('id')->on('figuras_legales');
            $table->foreign('destinoCredito_id')->references('id')->on('destino_credito');
            $table->foreign('garantia_id')->references('id')->on('garantias');
            $table->foreign('lineaCredito_id')->references('id')->on('lineas_creditos');
          //  $table->foreign('sujetoCredito_id')->references('id')->on('sujeto_creditos');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('periodicidad_id')->references('id')->on('periodicidades');
            $table->foreign('sector_id')->references('id')->on('sectores');
            $table->foreign('estadoInterno_id')->references('id')->on('estados_internos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
