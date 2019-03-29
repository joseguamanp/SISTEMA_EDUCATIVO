<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreasMateriasRequest extends FormRequest
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
            'nombre_area'=>'required|unique:acad_areas_materias',
            'descripcion'=>'required:acad_areas_materias'
            
        ];
    }
}
