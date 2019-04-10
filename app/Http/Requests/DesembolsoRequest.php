<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesembolsoRequest extends FormRequest
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
         $desembolso = $this->route('desembolso');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'fecha'       => 'required|date',
                     'proyecto_id' => 'required|unique:proyecto,nombre',
                     'nro'          => 'number|required',
                     'monto'        => 'required',
                     'pago'         => 'number|nullable',
                     'slug'         => 'nullable'
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                       'fecha'       => 'required|date',
                       'proyecto_id' => 'required|unique:proyecto,nombre',
                       'nro'          => 'number|required',
                       'monto'        => 'required',
                       'pago'         => 'number|nullable',
                     'slug'         => 'nullable|unique:desembolsos,slug,' . $desembolso->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'fecha.required' => 'El campo fecha es obligatorio'
        ];
    }
}
