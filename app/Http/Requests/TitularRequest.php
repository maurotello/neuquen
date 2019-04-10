<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitularRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         $titular = $this->route('titular');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'fecha_nacimiento'          => 'date|required',
                     'fecha_nacimiento_conyuge'  => 'date|nullable',
                     'dni'                       => 'required',
                     'apeynom'                   => 'required',
                     'cuit'                      => 'nullable',
                     'domicilioLegal'            => 'required',
                     'telefono'                  => 'nullable',
                     'mail'                      => 'nullable',
                     'estado_civil_id'           => 'required|exists:estados_civiles,id',
                     'proyecto_id'               => 'required|exists:proyectos,id',
                     'localidad_id'              => 'required|exists:localidades,id',
                     'apeynom_conyuge'           => 'nullable',
                     'dni_conyuge'               => 'nullable',
                     'telefono_conyuge'          => 'nullable',
                     'cuit_conyuge'              => 'nullable',
                     'descripcion'               => 'nullable|text',
                     'user_id'                   => 'nullable',
                     'slug'                      => 'nullable',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'fecha_nacimiento'          => 'date|required',
                     'fecha_nacimiento_conyuge'  => 'date|nullable',
                     'dni'                       => 'required',
                     'apeynom'                   => 'required',
                     'cuit'                      => 'nullable',
                     'domicilioLegal'            => 'required',
                     'telefono'                  => 'nullable',
                     'mail'                      => 'nullable',
                     'estado_civil_id'           => 'required|exists:estados_civiles,id',
                     'proyecto_id'               => 'required|exists:proyectos,id',
                     'localidad_id'              => 'required|exists:localidades,id',
                     'apeynom_conyuge'           => 'nullable',
                     'dni_conyuge'               => 'nullable',
                     'telefono_conyuge'          => 'nullable',
                     'cuit_conyuge'              => 'nullable',
                     'descripcion'               => 'nullable|text',
                     'user_id'                   => 'nullable',
                     'slug'                      => 'nullable|unique:titular,slug,' . $titular->id,
                 ];
             }
             default:
                 break;
         }
     }

     public function messages()
     {
        return [
            'fecha_nacimiento.required' => 'Fecha Nacimiento Titular incompleta',
            'dni.required' => 'Deberá completar el DNI del Titular',
            'apeynom.required' => 'Deberá completar el Nombre y Apellido del Titular',
            'domicilioLegal.required' => 'Deberá completar el Domicilio Legal del Titular',
            'estado_civil_id.required' => 'Deberá Seleccionar un Estado Civil',
            'proyecto_id.required' => 'Deberá Seleccionar un Proyecto',
            'localidad_id.required' => 'Deberá Seleccionar una Localidad',
        ];
    }
}
