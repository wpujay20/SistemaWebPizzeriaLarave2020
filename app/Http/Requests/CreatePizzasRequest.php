<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePizzasRequest extends FormRequest
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
            'pizza_nombre' => 'required',
            'pizza_precio' =>'required',
            'pizza_descripcion'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'pizza_nombre.required' => 'El :attribute es obligatorio.',
            'pizza_precio.required' => 'El :attribute es obligatorio.',
            'pizza_descripcion.required' => 'El :attribute es obligatorio.'
        ];
    }
}
