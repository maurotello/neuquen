<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoRequest extends FormRequest
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
         $movimiento = $this->route('movimiento');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'fecha'               => 'date|required',
                     //'slug'                => 'nullable',
                     'descripcion'         => 'nullable',
                     'file'                => 'nullable',
                     'user_id'             => 'nullable|exists:users,id',
                     'proyecto_id'         => 'nullable|exists:proyectos,id',


                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                   'fecha'               => 'date|required',
                   'descripcion'         => 'nullable',
                   'file'                => 'nullable',
                   'proyecto_id'         => 'nullable|exists:proyectos,id',
                   'user_id'             => 'nullable|exists:users,id',
                  // 'slug'                => 'nullable|unique:auditorias,slug,' . $auditoria->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'fecha.required' => 'Deberá completar la Fecha del Movimiento'
        ];
    }
}
