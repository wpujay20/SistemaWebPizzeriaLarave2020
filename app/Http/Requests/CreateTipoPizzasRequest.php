<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTipoPizzasRequest extends FormRequest
{


    //protected $redirectRoute = 'tipo_pizzas.index';
    //ruta definida en alguno de los archivos de la carpeta routes
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
            'tpi_nombre' => 'required',
            'tpi_tamano' =>'required',
            'tpi_descripcion'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'tpi_nombre.required' => 'El :attribute es obligatorio.',
            'tpi_tamano.required' => 'El :attribute es obligatorio.',
            'tpi_descripcion.required' => 'El :attribute es obligatorio.'
        ];
    }
}

