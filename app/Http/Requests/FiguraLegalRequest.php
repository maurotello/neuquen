<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiguraLegalRequest extends FormRequest
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
         $figuralegal = $this->route('figuralegal');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:figuras_legales,nombre',
                     'slug'         =>'nullable',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'       => 'required|min:4|max:100|unique:figuras_legales,nombre',
                     'slug'         => 'nullable|unique:figuras_legales,slug,' . $figuralegal->id,
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
