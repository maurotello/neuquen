<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefinanciacionRequest extends FormRequest
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
         $refinanciacion = $this->route('refinanciacion');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'fecha'                => 'date|required',
                     'montoRefinanciar'     => 'required',
                     'nroResolucion'        => 'nullable',
                     'plazoGracia'          => 'required',
                     'plazoAmortizacion'    => 'required',
                     'tasa'                 => 'nullable',
                     'descripcion'          => 'text|nullable',
                     'proyecto_id'          => 'required|exists:proyecto,id',
                     'user_id'              => 'nullable',
                     'slug'                 => 'nullable',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'fecha'                => 'date|required',
                     'montoRefinanciar'     => 'required',
                     'nroResolucion'        => 'nullable',
                     'plazoGracia'          => 'required',
                     'plazoAmortizacion'    => 'required',
                     'tasa'                 => 'nullable',
                     'descripcion'          => 'text|nullable',
                     'proyecto_id'          => 'required|exists:proyecto,id',
                     'user_id'              => 'nullable',
                     'slug'                 => 'nullable|unique:refinanciacion,slug,' . $refinanciacion->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'fecha.required' => 'Deberá completar la Fecha',
            'montoRefinanciar.required' => 'Deberá completar el Monto a Refinanciar',
            'plazoGracia.required' => 'Deberá completar el nuevo plazo de gracia de la Refinanciación',
            'plazoAmortizacion.required' => 'Deberá completar el nuevo plazo de Amortización de la Refinanciación',
            'proyecto_id.required' => 'Deberá Seleccionar el Proyecto a refinanciar'
        ];
    }
}
