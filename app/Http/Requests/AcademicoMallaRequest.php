<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicoMallaRequest extends FormRequest
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
            'nombre_malla' => 'required|unique:acad_mallas',
            'nombre_corto' => 'required|unique:acad_mallas',
            'num_sem_per_aca' => 'required:acad_mallas'
        ];
    }
}
