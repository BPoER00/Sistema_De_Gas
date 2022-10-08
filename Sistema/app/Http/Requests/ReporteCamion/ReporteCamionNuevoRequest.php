<?php

namespace App\Http\Requests\ReporteCamion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReporteCamionNuevoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'Gasto_Gas' => 'required|max:65',
            'Galones' => 'required|max:45',
            'Factura_No' => 'required|max:45',
            'Descripcion' => 'required|max:105',
            'Asignacion_Camion_Id' => 'required|numeric',
            'Usuario_Id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [

            //required
            'Gasto_Gas.required' => 'El campo [Gasto Gas] es requerido',
            'Galones.required' => 'El campo [Galones] es requerido',
            'Factura_No.required' => 'El campo [Factura No] es requerido',
            'Descripcion.required' => 'El campo [Descripcion] es requerido',
            'Asignacion_Camion_Id.required' => 'El campo [Asignacion Camion] es requerido',

            //max
            'Gasto_Gas.max' => 'El campo [Gasto Gas] tiene un maximo de [65] caracteres',
            'Galones.max' => 'El campo [Galones] tiene un maximo de [45] caracteres',
            'Factura_No.max' => 'El campo [Factura No] tiene un maximo de [45] caracteres',
            'Descripcion.max' => 'El campo [Descripcion] tiene un maximo de [105] caracteres',
            
        ];
    }
}
