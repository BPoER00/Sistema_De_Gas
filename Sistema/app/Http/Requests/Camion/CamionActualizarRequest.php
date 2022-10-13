<?php

namespace App\Http\Requests\Camion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CamionActualizarRequest extends FormRequest
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
            'Peso_Id' => 'required|numeric',
            'Categoria_Camiones_Uso_Id' => 'required|numeric',
            'Marca_Id' => 'required|numeric',
            'Tipo_Camion_Id' => 'required|numeric',
            'Rueda_Camion_Id' => 'required|numeric',
            'Tipo_Camion_Mercaderia_Id' => 'required|numeric',
            'Tamanio_Id' => 'required|numeric',
            'Uso_Camion_Id' => 'required|numeric'            
        ];
    }

    public function messages()
    {
        return [

            //required
            'Descripcion.required' => 'El campo [Descripcion] es requerido',
            'Peso_Id.required' => 'El campo [Peso] es requerido',
            'Categoria_Camiones_Uso_Id.required' => 'El campo [Categoria] es requerido',
            'Marca_Id.required' => 'El campo [Marca] es requerido',
            'Tipo_Camion_Id.required' => 'El campo [Tipo Camion] es requerido',
            'Rueda_Camion_Id.required' => 'El campo [Rueda Camion] es requerido',
            'Tipo_Camion_Mercaderia_Id.required' => 'El campo [Tipo Camion Mercaderia] es requerido',
            'Tamanio_Id.required' => 'El campo [Tamanio] es requerido',
            'Uso_Camion_Id.required' => 'El campo [Uso Camion] es requerido',

            //max
            'Descripcion.max' => 'El campo [Usuario] tiene un maximo de [100] caracteres'
            
        ];
    }
}
