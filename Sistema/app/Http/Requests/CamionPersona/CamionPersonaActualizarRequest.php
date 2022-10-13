<?php

namespace App\Http\Requests\CamionPersona;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CamionPersonaActualizarRequest extends FormRequest
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
            'Camiones_Id' => 'required|numeric',
            'Chofer_Id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //required 
            'Descripcion.required' => 'El campo [Descripcion] es requerido',
            'Camiones_Id.required' => 'El campo [Camiones] es requerido',
            'Chofer_Id.required' => 'El campo [Chofer] es requerido',
        
            //max
            'Descripcion.max' => 'El campo [Descripcion] tiene un maximo de [100] caracteres',
            
            //numeric
            'Camiones_Id.numeric' => 'Error al Ingresar el campo [Camiones]',
            'Chofer_Id.numeric' => 'Error al Ingresar el campo [Chofer]'    
        
        ];
    }
}
