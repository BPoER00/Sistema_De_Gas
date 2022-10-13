<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'User' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'User.required' => 'Ingrese Un Usuario Valido Para Continuar',
            'password' => 'Ingrese Un Password Valido Para Continuar'
        ];
    }
}
