<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalidadRequest extends FormRequest
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
         $localidad = $this->route('localidad');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'         => 'required',
                     'cp'             => 'required',
                     'user_id'        => 'nullable|exists:users,id',
                     'zona_id'        => 'nullable|exists:zonas,id',
                     'dptos_id'       => 'nullable|exists:departamentos,id',
                     'provincia_id'   => 'required|exists:provincias,id',


                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'         => 'required',
                     'cp'             => 'required',
                     'user_id'        => 'nullable|exists:users,id',
                     'zona_id'        => 'nullable|exists:zonas,id',
                     'dptos_id'       => 'nullable|exists:departamentos,id',
                     'provincia_id'   => 'required|exists:provincias,id',

                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'Deberá completar el Nombre de la Localidad',
            'cp.required' => 'Deberá completar el Código Postal de la Localidad'
        ];
    }
}
