<?php

namespace App\Http\Requests\Encargo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EncargoNuevoRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $usuario = Auth::user();

        $this->merge([
            'Usuario_Id' => $usuario ? $usuario->id : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Descripcion' => 'required|max:100',
            'Indicaciones' => 'required|max:100',
            'Direccion_Id' => 'required|numeric',
            'Persona_Id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //required
            'Descripcion.required' => 'El campo [Descripcion] es requerido',
            'Indicaciones.required' => 'El campo [Indicaciones] es requerido',
            'Direccion_Id.required' => 'El campo [Direccion] es requerido',
            'Persona_Id.required' => 'El campo [Persona] es requerido',

            //max
            'Descripcion.max' => 'El campo [Descripcion] tiene un maximo de [100] caracteres',
            'Indicaciones.max' => 'El campo [Indicaciones] tiene un maximo de [100] caracteres',
        ];
    }
}
