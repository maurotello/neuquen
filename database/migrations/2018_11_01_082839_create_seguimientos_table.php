<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned()->nullable();
            $table->date('fecha_seguimiento')->nullable();
            $table->string('profesional_cfi',250)->nullable();
            $table->string('profesional_uep',250)->nullable();
            $table->integer('grado_morosidad')->nullable();
            $table->integer('nro_entrevista')->nullable();
            $table->string('evaluador_sectorial_cfi',250)->nullable();
            $table->string('localizacion',250)->nullable();
            $table->string('tipo_proyecto',250)->nullable();

            $table->integer('personal_permanente')->nullable();
            $table->integer('personal_temporario')->nullable();
            $table->integer('personal_a_incorporar')->nullable();

            $table->double('credito_cfi')->nullable();
            $table->double('credito_otros_bancos')->nullable();
            $table->double('aporte_propio')->nullable();
            $table->double('credito_proveedores')->nullable();
            $table->double('inv_preinversion')->nullable();
            $table->double('inv_activo_fijo')->nullable();
            $table->double('inv_ct')->nullable();
            $table->double('prefinanciacion')->nullable();
            $table->text('detalle_inversiones')->nullable();


            $table->text('plazos_frecuencias_vigentes')->nullable();

            $table->integer('cant_cuotas')->nullable();
            $table->string('frecuencia_amortizacion',20)->nullable();
            $table->string('frecuencia_gracia',20)->nullable();

            $table->string('empresa_activa',3)->nullable();
            $table->string('empresa_inactiva',3)->nullable();
            $table->string('empresa_parcial',3)->nullable();

            $table->string('cambio_nomina',3)->nullable();



            // los 2 siguientes campos dependen de que se responda que si en el campo anterior
            $table->string('cambio_afectan_empresa',3)->nullable();
            $table->text('cambio_afectan_empresa_medida',3)->nullable();

            // Especificar los cambios, también depende de que se responda que si en cambio_nomina
            // Esto es para cuando hay cambios de los titulares de una emrpesa por ejemplo
            $table->string('especificar_nombre1',250)->nullable();
            $table->string('especificar_domicilio_telefono1',250)->nullable();

            $table->string('especificar_nombre2',250)->nullable();
            $table->string('especificar_domicilio_telefono2',250)->nullable();

            $table->string('especificar_nombre3',250)->nullable();
            $table->string('especificar_domicilio_telefono3',250)->nullable();

            $table->string('especificar_nombre4',250)->nullable();
            $table->string('especificar_domicilio_telefono4',250)->nullable();


            $table->string('cambios_localizacion',3)->nullable();
            $table->text('cambios_localizacion_causas')->nullable();

            $table->string('nueva_localizacion_domicilio',250)->nullable();
            $table->string('nueva_localizacion_localidad',250)->nullable();
            $table->string('nueva_localizacion_telefono',100)->nullable();
            $table->string('nueva_localizacion_cp',10)->nullable();
            $table->string('nueva_localizacion_provincia',100)->nullable();


            // Punto 10
            $table->string('puesta_en_marcha_nuevo_ampliacion',1)->nullable();
            
            // En este  campo hacer un combo con SI / NO / PARCIAL
            $table->string('puesta_en_marcha_si_no',9)->nullable();


            // problemas de porque no se puso en marcha
            $table->string('problema_1',3)->nullable();
            $table->string('problema_2',3)->nullable();
            $table->string('problema_3',3)->nullable();
            $table->string('problema_4',3)->nullable();
            $table->string('problema_5',3)->nullable();
            $table->string('problema_6',3)->nullable();
            $table->string('problema_7',3)->nullable();

            // Punto 10.2 Describir Razones consignadas
            $table->text('10_2_describir_razones_consignadas',3)->nullable();
            
            // 11 Inversiones Realizadas son las Previstas en el proyecto
            // En este  campo hacer un combo con SI / NO / PARCIAL
            $table->string('inv_previstas_si_no',9)->nullable();

            // Si se elije PARCIAL hay que poner el porcentaje de Desvio, al igual que si se elije NO
            $table->string('inv_previstas_desvios',20)->nullable();

            // 11.1 Razones del Desvio de las Inversiones
            $table->string('desvio_inv_problema_1',3)->nullable();
            $table->string('desvio_inv_problema_2',3)->nullable();
            $table->string('desvio_inv_problema_3',3)->nullable();
            $table->string('desvio_inv_problema_4',3)->nullable();
            $table->string('desvio_inv_problema_5',3)->nullable();
            $table->string('desvio_inv_problema_6',3)->nullable();
            $table->string('desvio_inv_problema_7',3)->nullable();
            $table->string('desvio_inv_problema_8',3)->nullable();

            //11.2 Descripción de las Razones Consignadas
            $table->text('11_2_describir_razones_consignadas',3)->nullable();

            //11.3 Las inversiones se han podido verificar
            // En este  campo hacer un combo con SI / NO / PARCIAL
            $table->string('inv_verificacion_si_no',9)->nullable();
            $table->string('forma_de_verificacion',250)->nullable();

            //11.4 Las inversiones realizadas con el credito son las proyectas
            // En este  campo hacer un combo con SI / NO / PARCIAL
            $table->string('inv_proyectadas_si_no',9)->nullable();

            //11.5 Razones
            $table->text('11_5_inv_proyectadas_razones')->nullable();

            //12 Se han registrado nuevas inversiones
            // En este  campo hacer un combo con SI / NO
            $table->string('nuevas_inv_si_no',2)->nullable();
            $table->double('monto_aprox_nuevas_inversiones')->nullable();

            //12.1 Si responde que si y pone el monto tenemos que describir cuales son
            $table->text('12_1_detalle_nuevas_inversiones')->nullable();

            //12.2 Las nuevas inversiones fueron verificadas
            // En este  campo hacer un combo con SI / NO
            $table->string('nuevas_inv_verificacion_si_no',2)->nullable();
            $table->string('forma_verificacion_nuevas_inv',250)->nullable();
            

            //12 3 Incidencia de las nuevas inversiones en la empresa
            $table->string('12_3_aumento_produccion',3)->nullable();
            $table->string('12_3_calidad_productos',3)->nullable();
            $table->string('12_3_disminucion_costos',3)->nullable();
            $table->string('12_3_otros',3)->nullable();

            //13. Se han observado cambios significativos en los costos totales??
            
            //Materia Prima SI NO, PORCENTAJE y Razones
            $table->string('13_materia_prima_si_no',2)->nullable();
            $table->string('13_materia_prima_porcentaje',10)->nullable();
            $table->string('13_materia_prima_razones',100)->nullable();


            //Insunos SI NO, PORCENTAJE y Razones
            $table->string('13_insumos_si_no',2)->nullable();
            $table->string('13_insumos_porcentaje',10)->nullable();
            $table->string('13_insumos_razones',100)->nullable();


            //Mano de OBRA SI NO, PORCENTAJE y Razones
            $table->string('13_mano_obra_si_no',2)->nullable();
            $table->string('13_mano_obra_porcentaje',10)->nullable();
            $table->string('13_mano_obra_razones',100)->nullable();

            //Otros SI NO, PORCENTAJE y Razones
            $table->string('13_otros_si_no',2)->nullable();
            $table->string('13_otros_porcentaje',10)->nullable();
            $table->string('13_otros_razones',100)->nullable();

            //14. Mano de Obra empleada
            $table->integer('mo_antes_del_credito')->nullable();
            $table->integer('mo_con_el_credito')->nullable();

            $table->integer('mo_permanente')->nullable();
            $table->integer('mo_temporaria')->nullable();

            //14 Aclaraciones
            $table->text('14_mo_aclaraciones')->nullable();

            //15 La empresa tiene problema para su funcionamiento
            $table->string('problemas_funcionamiento_si_no',2)->nullable();

            //15.1. Cuales
            $table->string('15_1_problemas_administrativos_si_no',2)->nullable();
            $table->string('15_1_problemas_provision_mp_si_no',2)->nullable();
            $table->string('15_1_problemas_disponibilidad_mo_si_no',2)->nullable();
            $table->string('15_1_problemas_calificacion_mo_si_no',2)->nullable();
            $table->string('15_1_problemas_proceso_prod_si_no',2)->nullable();
            $table->string('15_1_problemas_comercializacion_si_no',2)->nullable();
            $table->string('15_1_problemas_financieros_si_no',2)->nullable();
            $table->string('15_1_problemas_servicios_si_no',2)->nullable();
            $table->string('15_1_problemas_comunicaciones_si_no',2)->nullable();
            $table->string('15_1_problemas_climaticos_si_no',2)->nullable();
            $table->string('15_1_problemas_otros_si_no',2)->nullable();
            
            //15.2 Descripcion Problema y posibles soluciones
            $table->text('15_2_descripcion_problmeas')->nullable();

            //16 Evolucion de los Ingresos
            $table->string('16_ingresos_aumentaron',2)->nullable();
            $table->string('16_ingresos_disminuyeron',2)->nullable();
            $table->string('16_ingresos_no_variaron',2)->nullable();
            $table->string('16_ingresos_proporcion',20)->nullable();

            //16.1 RAZONES
            
            //Precio de los Productos
            $table->string('16_1_precio_productos_si_no',2)->nullable();
            $table->string('16_1_precio_productos_variacion',20)->nullable();

            //Volúmen de Ventas
            $table->string('16_1_volumen_vta_si_no',2)->nullable();
            $table->string('16_1_volumen_vta_variacion',20)->nullable();

            //Gtos Comercialización
            $table->string('16_1_gtos_comercializacion_si_no',2)->nullable();
            $table->string('16_1_gtos_comercializacion_variacion',20)->nullable();

            //Niveles de Produccion
            $table->string('16_1_nivel_prod_si_no',2)->nullable();
            $table->string('16_1_nivel_prod_variacion',20)->nullable();

            //OTROS
            $table->string('16_1_otros_si_no',2)->nullable();
            $table->string('16_1_otros_variacion',20)->nullable();

            //16.2. Observaciones
            $table->text('16_2_observaciones')->nullable();

            //16.3 Evolución ingresos con respecto al mes o periodo anterior. En caso de que la empresa sea estacional
            $table->string('16_3_periodo_anterior_ingresos_aumentaron',2)->nullable();
            $table->string('16_3_periodo_anterior_ingresos_disminuyeron',2)->nullable();
            $table->string('16_3_periodo_anterior_ingresos_no_variaron',2)->nullable();
            $table->string('16_3_periodo_anterior_ingresos_proporcion',20)->nullable();

            // 16.4. Porque?
            $table->text('16_4_periodo_anterior_ingresos_porque')->nullable();

            //17 Perspectiva Futuro
            // Hacer un combo con Mejor, Algo Mejor, Igual, Algo Peor, Peor
            $table->string('17_perspectiva_futuro',15)->nullable();
            $table->text('17_perspectiva_futuro_porque')->nullable();



            // 18. La empresa tiene problemas para el pago del Credito con el CFI
            // Si dice que SI estos son problemas Actuales o a Futuro
            // Hacer un combo con SI / NO
            $table->string('18_problemas_pago_credito',2)->nullable();

            // Hacer un combo con las opciones ACTUALES y FUTURO y que aparezca cuando eligen SI que tienen
            // problemas para el pago del crdito
            $table->string('18_problemas_pago_si_actuales_futuros',20)->nullable();

            $table->text('18_problmeas_pago_razones')->nullable();


            //19 Los problemas planteados en la ENTREVISTA anterior han sido solucionados?
            // COMBO SI / NO
            $table->string('19_problemas_entrevista_anterior',2)->nullable();

            // Si es SI tienen que responder a la pregunta COMO ???
            $table->string('19_problemas_entrevista_anterior_como',250)->nullable();

            $table->text('19_1_entrevista_anterior_razones')->nullable();

            // 20. Asistencia Tecnica
            // COMBO SI / NO
            $table->string('20_asistencia_financiera',2)->nullable();

            //Si responde SI compleatar esto
            //Combo con los siguientes valroes
            //1. Técnicos - Productivos
            //2. Gestión Admin-Financiera
            //3. Mercado y Comercialización
            $table->string('20_asistencia_financiera_en_que',50)->nullable();
            $table->text('20_1_asistencia_financiera_ampliacion')->nullable();            




            // 20_2. Ha recibido Anteriormente capacitacion
            // COMBO SI / NO
            $table->string('20_2_anteriormente_capacitacion',2)->nullable();

            //Si responde SI compleatar esto
            $table->text('20_2_anteriormente_capac_tipo_cargo')->nullable();


             // 20_3. El empresario esta interesado en recibir capacitación
            // COMBO SI / NO / NO SABE
            $table->string('20_3_recibir_capacitacion',10)->nullable();

            //Si responde en que temas
            $table->text('20_3_en_que_temas')->nullable();


            // 21 Importancia de la Actividad, combo con
            // a. Unica
            // b. Principal
            // c. Secundaria
            $table->string('21_importancia_actividad',20)->nullable();

            // 21.1 Perspectiva para que se convierta en Actividad Ppal si no la es
            // COMBO con SI / NO
            $table->string('21_1_actividad_ppal_perspectiva',2)->nullable();

            //21.2 Observaciones
            $table->text('21_2_observaciones')->nullable();

            //22 Opinion del Responsable 
            $table->text('22_opinion_responsable')->nullable();


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
        Schema::dropIfExists('seguimientos');
    }
}
