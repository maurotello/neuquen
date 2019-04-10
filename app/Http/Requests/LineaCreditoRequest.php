<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LineaCreditoRequest extends FormRequest
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
         $lineacredito = $this->route('lineacredito');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'              => 'required|min:4|max:100|unique:lineas_creditos,nombre',
                     'descripcion'         => 'required',
                     'monto_maximo'        => 'required',
                     'gracia_maximo'       => 'required',
                     'amortizacion_maximo' => 'required',
                     'tasa'                => 'required',
                     'slug'                => 'nullable',

                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                   'nombre'              => 'required|min:4|max:100|unique:lineas_creditos,nombre,' . $lineacredito->id,
                   'descripcion'         => 'required',
                   'monto_maximo'        => 'required',
                   'gracia_maximo'       => 'required',
                   'amortizacion_maximo' => 'required',
                   'tasa'                => 'required',
                   'slug'                => 'nullable|unique:lineas_creditos,slug,' . $lineacredito->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'El Nombre de la Figura Legal es obligatorio'
        ];
    }
}
