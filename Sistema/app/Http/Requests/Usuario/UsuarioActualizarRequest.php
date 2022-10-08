<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
class UsuarioActualizarRequest extends FormRequest
{
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
            'User' => 'required|max:100',
            'email' => 'required|max:100|unique:usuario,email,'.$this->usuario,
            'password' => ['required', 'confirmed', Password::min(8)],
            'password_confirmation' => 'required',
            'Roles_Id' => 'required'
        ];
    }

    public function messages()
    {
        return [

            //required
            'User.required' => 'El campo [Usuario] es requerido',
            'email' => 'El campo [Email] es requerido',
            'password' => 'El campo [Password] es requerido',
            'password_confirmation' => 'El campo [Password Confirm] es requerido',
            'Roles_Id' => 'El campo [Rol] es requerido',

            //max
            'User.max' => 'El campo [Usuario] tiene un maximo de [100] caracteres',
            'email.max' => 'El campo [Email] tiene un maximo de [100] caracteres',
            'password.min' => 'El campo [Password] debe tener almenos [8] caracteres',

            //confirm
            'password.confirmed' => 'Debe confirmar la [Password]',

            //unique
            'email.unique' => 'El [Email] Ingresado ya se encuentra en uso.'
        ];
    }
}
