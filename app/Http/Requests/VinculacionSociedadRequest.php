<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinculacionSociedadRequest extends FormRequest
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
            'etiqueta' => 'required|unique:sene_participaenproyectovinculacionsociedad',
        ];
    }
}
