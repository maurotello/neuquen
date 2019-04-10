<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditoriaRequest extends FormRequest
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
         $auditoria = $this->route('auditoria');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'modelo'              => 'required',
                     'slug'                => 'nullable',
                     'fecha'               => 'required',
                     'valor_actual'        => 'nullable',
                     'valor_anterior'      => 'nullable',
                     'user_id'             => 'nullable|exists:users,id',

                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'modelo'              => 'required',
                     'fecha'               => 'required',
                     'valor_actual'        => 'nullable',
                     'valor_anterior'      => 'nullable',
                   'user_id'             => 'nullable|exists:users,id',
                   'slug'                => 'nullable|unique:auditorias,slug,' . $auditoria->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'modelo.required' => 'La Tabla Auditada es obligatoria'
        ];
    }
}
