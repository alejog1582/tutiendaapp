<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMarca extends FormRequest
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
            'nombre_marca' => 'required',
			'referencia_marca' => 'required|unique:marcas,referencia_marca',
        ];
    }

    public function messages() {
		return [
			'nombre_marca.required' => 'El campo Nombre de Marca es requerido',
			'referencia_marca.required' => 'El campo Referencia de Marca es requerido',
			'referencia_marca.unique' => 'La referencia ingresada ya existe para otra marca',			
		];
	}
}
