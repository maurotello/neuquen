<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SujetoCreditoRequest extends FormRequest
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
         $sujetoCredito = $this->route('sujetoCredito');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'fecha_envio_banco'        => 'date|required',
                     'fecha_respuesta_banco'    => 'date',
                     'sujeto_credito'           => 'nullable',
                     'descripcion'              => 'nullable',
                     'proyecto_id'              => 'required|exists:proyecto,id',
                     'sucursal_id'              => 'required|exists:sucursal,id',
                     'user_id'                  => 'nullable',
                     'slug'                     => 'nullable',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'fecha_envio_banco'        => 'date|required',
                     'fecha_respuesta_banco'    => 'date',
                     'sujeto_credito'           => 'nullable',
                     'descripcion'              => 'nullable',
                     'proyecto_id'              => 'required|exists:proyecto,id',
                     'sucursal_id'              => 'required|exists:sucursal,id',
                     'user_id'                  => 'nullable',
                     'slug'                 => 'nullable|unique:sujetoCredito,slug,' . $sujetoCredito->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'fecha_envio_banco.required' => 'Deberá completar la Fecha de Envío al Banco',
            'fecha_respuesta_banco.required' => 'Deberá completar la Fecha de Respuesta del Banco',
            'sujeto_credito.required' => 'Deberá completar si fué declarado Sujeto de Crédito',
            'proyecto_id.required' => 'Deberá Seleccionar el Proyecto a refinanciar',
            'sucursal_id.required' => 'Deberá Seleccionar el Banco'
        ];
    }
}
