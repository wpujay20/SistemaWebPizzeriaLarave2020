<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePerfilUsuarioRequest extends FormRequest
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
        return [
            'per_nombres' => 'required',
            'per_apellidos' =>'required',
            'per_dni' =>'required',
            'per_telefono' =>'required',
            'usu_correo' =>'required',
            'usu_pass' =>'required'
        ];
    }
}
