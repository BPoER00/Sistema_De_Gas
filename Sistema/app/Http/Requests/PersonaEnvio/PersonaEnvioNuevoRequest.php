<?php

namespace App\Http\Requests\PersonaEnvio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PersonaEnvioNuevoRequest extends FormRequest
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
            'Nombre' => 'required|max:100',
            'Apellido' => 'required|max:100',
            'Documento_Identificacion' => 'required|max:100',
            'Telefono' => 'required|max:100',
            'Email' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [

            //required
            'Nombre.required' => 'El campo [Nombre] es requerido',
            'Apellido.required' => 'El campo [Apellido] es requerido',
            'Documento_Identificacion.required' => 'El campo [DPI] es requerido',
            'Telefono.required' => 'El campo [Telefono] es requerido',
            'Email.required' => 'El campo [Email] es requerido',

            //max
            'Nombre.max' => 'El campo [Nombre] tiene un maximo de [80] caracteres',
            'Apellido.max' => 'El campo [Apellido] tiene un maximo de [80] caracteres',
            'Documento_Identificacion.max' => 'El campo [DPI] tiene un maximo de [45] caracteres',
            'Telefono.max' => 'El campo [Telefono] tiene un maximo de [100] caracteres',
            'Email.max' => 'El campo [Email] tiene un maximo de [80] caracteres',
        ];
    }
}
