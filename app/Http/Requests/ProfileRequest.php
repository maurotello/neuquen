<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
         $profile = $this->route('profile');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'          => 'nullable',
                     'avatar'          => 'nullable',
                     'slug'            => 'nullable',
                     'telefono'        => 'nullable',
                     'apellido'        => 'nullable',
                     'user_id'         => 'nullable|exists:users,id',
                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'          => 'nullable',
                     'apellido'        => 'nullable',
                     'telefono'        => 'nullable',
                     'avatar'          => 'nullable',
                     'user_id'         => 'nullable|exists:users,id',
                     'slug'            => 'nullable|unique:profile,slug,' . $profile->id,
                 ];
             }
             default:
                 break;
         }
     }
}
