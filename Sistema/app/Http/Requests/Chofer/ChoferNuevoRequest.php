<?php

namespace App\Http\Requests\Chofer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChoferNuevoRequest extends FormRequest
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
            'Documento_Identificacion' => 'required|max:85',
            'Nombre' => 'required|max:55',
            'Apellido' => 'required|max:55',
            'Fecha_Nacimiento' => 'required|date',
            'Licencia' => 'required|max:100',
            'Tipo_Licencia' => 'max:100',
            'Fecha_Vencimiento' => 'date',
            'Telefono' => 'required|max:30',
            'Email' => 'required|max:150',
            'Estado_Civil_Id' => 'required',
            'Etnia_Id' => 'required'            
        ];
    }

    public function messages()
    {
        return [

            //required
            'Documento_Identificacion' => 'El campo [DPI] es requerido',
            'Nombre' => 'El campo [Nombre] es requerido',
            'Apellido' => 'El campo [Apellido] es requerido',
            'Fecha_Nacimiento' => 'El campo [Fecha_Nacimiento] es requerido',
            'Licencia' => 'El campo [Licencia] es requerido',
            'Telefono' => 'El campo [Telefono] es requerido',
            'Email' => 'El campo [Email] es requerido',
            'Estado_Civil_Id' => 'El campo [Estado Civil Id] es requerido',
            'Etnia_Id' => 'El campo [Etnia] es requerido',  
    
            //max
            'Documento_Identificacion' => 'El campo [Documento] tiene un maximo de [100] caracteres',
            'Nombre' => 'El campo [Nombre] tiene un maximo de [100] caracteres',
            'Apellido' => 'El campo [Apellido] tiene un maximo de [100] caracteres',
            'Licencia' => 'El campo [Licencia] tiene un maximo de [100] caracteres',
            'Tipo_Licencia' => 'El campo [Tipo_Licencia] tiene un maximo de [100] caracteres',
            'Telefono' => 'El campo [Telefono] tiene un maximo de [100] caracteres',
            'Email' => 'El campo [Email] tiene un maximo de [100] caracteres',

            //date
            'Fecha_Nacimiento' => 'El campo [Fecha Nacimiento] es de tipo fecha',
            'Fecha_Vencimiento' => 'El campo [Fecha Vencimiento] es de tipo fecha',

        ];
    }
}
