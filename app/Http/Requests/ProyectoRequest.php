<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $proyecto = $this->route('proyecto');

        switch ($this->method()) 
        {
            case 'GET':
            case 'DELETE': {
                 return [];
             }
            case 'POST': {
                return 
                [
                     'fechaIngreso'             => 'required|date',
                     'nombre'                   => 'required',
                     'numeroInterno'            => 'nullable|unique:proyectos,numeroInterno',
                     'numeroCfi'                => 'nullable|unique:proyectos,numeroCfi|required_with: fechaAprobadoCfi',
                     'localidad_id'             => 'required',
                     'lineaCredito_id'          => 'required',
                     'estado_id'                => 'required',
                     'estadoInterno_id'         => 'required',
                     'sector_id'                => 'required',
                     'monto'                    => 'required',
                     'tamanio'                  => 'nullable',
                     'slug'                     => 'nullable',
                     'domicilioProyecto'        => 'required_with:fechaAprobadoUep',
                     'domicilioLegal'           => 'nullable',
                     'telefono'                 => 'nullable',
                     'email'                    => 'nullable',
                     'web'                      => 'nullable',
                     'productos'                => 'required_with:fechaAprobadoUep',
                     'ciuu'                     => 'nullable',
                     'mo'                       => 'nullable',
                     'enuep'                    => 'nullable',
                     'descripcion'              => 'nullable',
                     'inversionTotal'           => 'required_with:inversionRealizada, inversionARealizar_af, inversionARealizar_ct',
                     'inversionRealizada'       => 'nullable',
                     'inversionARealizar_af'    => 'nullable',
                     'inversionARealizar_ct'    => 'nullable',
                     'figuraLegal_id'           => 'required_with:fechaAprobadoUep',
                     'periodicidad_id'          => 'required_with:fechaAprobadoUep',
                     'destinoCredito_id'        => 'required_with:fechaAprobadoUep',
                     //'plazoGracia'              => 'numeric|between:1,24|required_with: fechaAprobadoUep',
                     //'plazoAmortizacion'        => 'numeric|between:1,84|required_with: fechaAprobadoUep',
                     //'cantidadDesembolsos'      => 'numeric|between:1,3|required_with: fechaAprobadoUep',
                     'tasa'                     => 'nullable',
                     'garantia_id'              => 'nullable|exists:garantias,id|required_with:fechaAprobadoUep',
                     'sucursal_id'              => 'nullable|exists:provincias,id|required_with:fechaEnvioBanco',
                     'descripcionGarantia'      => 'nullable',
                     'fechaCaducoBanco'         => 'date|nullable|after:fechaEnvioBanco',
                     'fechaAprobadoUep'         => 'date|nullable|after:fechaRespuestaBanco',
                     'fechaEnviadoCfi'          => 'date|nullable|after:fechaAprobadoUep',
                     'fechaAprobadoCfi'         => 'date|nullable|after:fechaEnviadoCfi',
                     'fechaTramdispo'           => 'date|nullable|after:fechaAprobadoCfi',
                     'fechaComunicaTran'        => 'date|nullable|after:fechaTramdispo',
                     'fechaDesembolso'          => 'date|nullable|after:fechaAprobadoCfi',
                     'fechaEfectivizacion'      => 'date|nullable|after:fechaComunicaTran',
                     'fechaDesistido'           => 'date|nullable|after:fechaIngreso',
                     'fechaEnvioBanco'          => 'date|nullable|after:fechaIngreso',
                     'fechaRespuestaBanco'      => 'date|nullable|after:fechaEnvioBanco',
                     'fechaJudicial'            => 'date|nullable|after:fechaEfectivizacion',
                     'fechaCancelado'           => 'date|nullable|after:fechaEfectivizacion',
                     'fechaArchivado'           => 'date|nullable|after:fechaAprobadoCfi',
                     'fechaUltimoMovimiento'    => 'date|nullable|after:fechaIngreso',
                     'refinanciado'             => 'required_with:fechaEfectivizacion',
                     'user_id'                  => 'nullable',
                     'titular'                  => 'nullable',
                     'observaciones'            => 'nullable',

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return 
                [
                     'fechaIngreso'             => 'required|date',
                     'nombre'                   => 'required',
                     'numeroInterno'            => 'nullable|unique:proyectos,numeroInterno',
                     'numeroCfi'                => 'required_with:fechaAprobadoCfi|nullable|unique:proyectos,numeroCfi,'. $proyecto->id,
                     'localidad_id'             => 'required|exists:localidades,id',
                     'lineaCredito_id'          => 'required|exists:lineas_creditos,id',
                     'estado_id'                => 'required|exists:estados,id',
                     'estadoInterno_id'         => 'required|exists:estados_internos,id',
                     'sector_id'                => 'required|exists:sectores,id',
                     'monto'                    => 'required|numeric',
                     'tamanio'                  => 'nullable',
                     'domicilioProyecto'        => 'required_with:fechaAprobadoUep',
                     'domicilioLegal'           => 'nullable',
                     'telefono'                 => 'nullable',
                     'email'                    => 'nullable',
                     'web'                      => 'nullable',
                     'productos'                => 'required_with:fechaAprobadoUep',
                     'ciuu'                     => 'nullable',
                     'mo'                       => 'nullable',
                     'enuep'                    => 'nullable',
                     'descripcion'              => 'nullable',
                     'inversionTotal'           => 'nullable|numeric|required_with:inversionRealizada,inversionARealizar_af,inversionARealizar_ct',
                     'inversionRealizada'       => 'nullable|numeric',
                     'inversionARealizar_af'    => 'nullable|numeric',
                     'inversionARealizar_ct'    => 'nullable|numeric',
                     'figuraLegal_id'           => 'required_with:fechaAprobadoUep',
                     'periodicidad_id'          => 'required_with:fechaAprobadoUep',
                     'destinoCredito_id'        => 'required_with:fechaAprobadoUep',
                     //'plazoGracia'              => 'numeric|between:1,24|required_with: fechaAprobadoUep',
                    // 'plazoAmortizacion'        => 'numeric|between:1,84|required_with: fechaAprobadoUep',
                    // 'cantidadDesembolsos'      => 'numeric|between:1,3|required_with: fechaAprobadoUep',
                     'garantia_id'              => 'nullable|exists:garantias,id|required_with:fechaAprobadoUep',
                     'sucursal_id'              => 'nullable|exists:provincias,id|required_with:fechaEnvioBanco',
                     'descripcionGarantia'      => 'nullable',
                     'fechaCaducoBanco'         => 'date|nullable|after:fechaEnvioBanco',
                     'fechaAprobadoUep'         => 'date|nullable|after:fechaRespuestaBanco',
                     'fechaEnviadoCfi'          => 'date|nullable|after:fechaAprobadoUep',
                     'fechaAprobadoCfi'         => 'date|nullable|after:fechaEnviadoCfi',
                     'fechaTramdispo'           => 'date|nullable|after:fechaAprobadoCfi',
                     'fechaComunicaTran'        => 'date|nullable|after:fechaTramdispo',
                     'fechaDesembolso'          => 'date|nullable|after:fechaAprobadoCfi',
                     'fechaEfectivizacion'      => 'date|nullable|after:fechaComunicaTran',
                     'fechaDesistido'           => 'date|nullable|after:fechaIngreso',
                     'fechaEnvioBanco'          => 'date|nullable|after:fechaIngreso',
                     'fechaRespuestaBanco'      => 'date|nullable|after:fechaEnvioBanco',
                     'fechaJudicial'            => 'date|nullable|after:fechaEfectivizacion',
                     'fechaCancelado'           => 'date|nullable|after:fechaEfectivizacion',
                     'fechaArchivado'           => 'date|nullable|after:fechaAprobadoCfi',
                     'fechaUltimoMovimiento'    => 'date|nullable|after:fechaIngreso',
                     'refinanciado'             => 'nullable|required_with:fechaEfectivizacion',
                     'user_id'                  => 'nullable',
                     'titular'                  => 'nullable',
                     'observaciones'            => 'nullable',
                     'slug'                     => 'nullable|unique:proyectos,slug,' . $proyecto->id,
                ];
            }
            default:
                break;
         }
    }
    
    public function messages()
    {
        return 
        [
            'nombre.required'               => 'Nombre obligatorio',
            'numeroInterno.unique'          => 'El número Interno debe ser único', 
            'numeroCfi.unique'              => 'El número CFI debe ser único',         
            'fechaIngreso.required'         => 'Fecha de Ingreso obligatorio',
            'localidad_id.required'         => 'Localidad obligatoria',
            'lineaCredito_id.required'      => 'La Línea de Crédito obligatoria',
            'estado_id.required'            => 'El Estado es obligatorio',
            'estadoInterno_id.required'     => 'El Estado Interno es obligatorio',
            'sector_id.required'            => 'El Sector es obligatorio',
            'monto.required'                => 'El Monto es obligatorio',
            'monto.numeric'                 => 'El Monto debe ser un número válido',
            'refinanciado.required_with'    => 'Refinanciado sin ser Efectivizado',
            'inversionTotal.required_with'  => 'Inversión Total sin discriminar',
            'domicilioProyecto.required_with' => 'Aprobado por la UEP sin Domicilio del Proyecto',
            'garantia_id.required_with'     => 'El campo Garantía es requerido al tener fecha de Aprobación por la UEP',
            'fechaUltimoMovimiento.after'   => 'Fecha de último movimiento sin Fecha de Ingreso',
            'fechaArchivado.after'          => 'Fecha Archivado sin Fecha Aprobado CFI',
            'fechaCancelado.after'          => 'Fecha Cancelado sin Fecha Efectivización',
            'fechaJudicial.after'           => 'Fecha Judicial sin Fecha Efectivización',
            'fechaRespuestaBanco.after'     => 'Fecha Respuesta Banco sin Fecha Envio Banco',
            'fechaEnvioBanco.after'         => 'Fecha Envío Banco Inferior a Fecha Ingreso',
            'fechaDesistido.after'          => 'Fecha Desistido sin Fecha Ingreso',
            'fechaEfectivizacion.after'     => 'Fecha Efectivización sin Fecha Comunica Tran',
            'fechaDesembolso.after'         => 'Fecha Desembolso sin Fecha Aprobado CFI',
            'fechaTramdispo.after'         => 'Fecha Comunica. Tran. sin Fecha Tram. Dispo.',
            'fechaAprobadoCfi.after'        => 'Fecha Aprobado CFI sin Fecha Enviado CFI',
            'fechaEnviadoCfi.after'         => 'Fecha Enviado al CFI sin Fecha Aprobado UEP',
            'fechaAprobadoUep.after'        => 'Fecha Aprobado UEP sin Fecha Respuesta del Banco',
            'fechaCaducoBanco.after'        => 'Fecha Caduco Banco sin Fecha Envío al Banco',
            'figuraLegal_id.required_with'  => 'Al tener Fecha Aprobado por la UEP es necesario completar la Figura Legal',
            'periodicidad_id.required_with' => 'Al tener Fecha Aprobado por la UEP es necesario completar la Periodicidad',
            'destinoCredito_id.required_with' => 'Al tener Fecha Aprobado por la UEP es necesario completar el Destino del Crédito',
            'productos.required_with' => 'Al tener Fecha Aprobado por la UEP es necesario completar el campo "Productos"',
            'plazoGracia.required_with'     => 'Al tener Fecha Aprobado por la UEP es necesario completar el Plazo de Gracia del Crédito',
            'plazoGracia.between'           => 'Plazo de ´Gracia debe ser un número entre el 0 y 24',
            'plazoGracia.numeric'           => 'Plazo de ´Gracia debe ser un número',
            'plazoAmortizacion.required_with' => 'Al tener Fecha Aprobado por la UEP es necesario completar el Plazo de Amortización del Crédito',
            'plazoAmortizacion.between' => 'El Plazo de Amortización debe estar entre 1 y 84, según Línea de Crédito',
            'plazoAmortizacion.numeric' => 'El Plazo de Amortización debe ser un número',
            'cantidadDesembolsos.required_with' => 'Al tener Fecha Aprobado por la UEP es necesario completar la Cantidad de Desembolsos',
            'cantidadDesembolsos.between' => 'La Cantidad de Desembolsos de un Proyecto no puede ser mayor a 3',
            'cantidadDesembolsos.numeric' => 'La Cantidad de Desembolsos debe ser un número',
            
        
        ];

    }
    
}
