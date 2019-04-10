<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoInternoRequest extends FormRequest
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
         $estadointerno = $this->route('estadointerno');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:estados_internos,nombre',
                     'slug'         => 'nullable',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:estados_internos,nombre',
                     'slug'         => 'nullable|unique:estados_internos,slug,' . $estadointerno->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'El Nombre del Estado Interno es obligatorio'
        ];
    }
}
