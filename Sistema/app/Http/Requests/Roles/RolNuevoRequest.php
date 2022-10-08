<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RolNuevoRequest extends FormRequest
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
            'Nombre_Rol' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            
            //required
            'Nombre_Rol.required' => 'El campo [Nombre Rol] es requerido',
            
            //max
            'Nombre_Rol.max' => 'El campo [Nombre Rol] tiene un maximo de [100] caracteres'
        ];
    }
}
