<?php

namespace App\Http\Requests\AsignacionCamion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AsignacionCamionNuevoRequest extends FormRequest
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
            'Encargo_Id' => 'required|numeric',
            'Camion_Persona_Id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            
            //required
            'Descripcion.required' => 'El campo [Descripcion] es requerido',
            'Encargo_Id.required' => 'El campo [Encargo] es requerido',
            'Camion_Persona_Id.required' => 'El campo [Camion Persona] es requerido',
        
            //max
            'Descripcion.max' => 'El campo [Descripcion] tiene un maximo de [100] caracteres'
        ];
    }
}
