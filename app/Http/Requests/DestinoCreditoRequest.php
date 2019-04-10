<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinoCreditoRequest extends FormRequest
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
         $destinocredito = $this->route('destinocredito');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:destino_credito,nombre',
                     'slug'         => 'nullable'
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:destino_credito,nombre',
                     'slug'         => 'nullable|unique:destino_credito,slug,' . $destinocredito->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'El Nombre del Destino de Crédito es obligatorio'
        ];
    }
}
