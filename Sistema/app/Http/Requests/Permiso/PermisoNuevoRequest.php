<?php

namespace App\Http\Requests\Permiso;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PermisoNuevoRequest extends FormRequest
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
            'Roles_Id' => 'required|numeric',
            'Modulo_Id' => 'required|numeric',
            'Accion_Id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //required
            'Descripcion.required' => 'El campo [Descripcion] es requerido',
            'Roles_Id.required' => 'El campo [Rol] es requerido',
            'Modulo_Id.required' => 'El campo [Modulo] es requerido',
            'Accion_Id.required' => 'El campo [Accion] es requerido',   

            //max
            'Descripcion.max' => 'El campo [Descripcion] tiene un maximo de [100] caracteres'

        ];
    }
}
