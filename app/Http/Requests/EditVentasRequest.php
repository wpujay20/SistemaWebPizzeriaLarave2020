<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditVentasRequest extends FormRequest
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
            'vnt_estado' => 'required'
        ];
    }

    public function messages()
{
    return [
        'vnt_estado.required' => 'El estado es obligatorio',
    ];
}


}
