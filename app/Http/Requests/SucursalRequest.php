<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalRequest extends FormRequest
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
         $sucursal = $this->route('sucursal');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'           => 'required',
                     'telefono'         => 'nullable',
                     'direccion'        => 'nullable',
                     'email'            => 'nullable',
                     'user_id'          => 'nullable|exists:users,id',
                     'banco_id'         => 'required|exists:bancos,id',
                     'localidad_id'     => 'required|exists:localidades,id',


                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'           => 'required',
                     'telefono'         => 'nullable',
                     'direccion'        => 'nullable',
                     'email'            => 'nullable',
                     'user_id'          => 'nullable|exists:users,id',
                     'banco_id'         => 'required|exists:bancos,id',
                     'localidad_id'     => 'required|exists:localidades,id',

                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'Deberá completar el Nombre de la Sucursal',
        ];
    }
}
