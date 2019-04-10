<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinciaRequest extends FormRequest
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
         $provincia = $this->route('provincia');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:provincias,nombre',
                     'codigo'       => 'required|unique:provincias,codigo',
                     'slug'         => 'nullable',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:provincias,nombre',
                     'codigo'       => 'required|unique:provincias,codigo',
                     'slug'         => 'nullable|unique:provincias,slug,' . $provincia->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'El Nombre de la Provincia es obligatorio',
            'codigo.required' => 'El Código de la Provincia es obligatorio'
        ];
    }
}
