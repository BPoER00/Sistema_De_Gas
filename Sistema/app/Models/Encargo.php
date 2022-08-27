<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encargo extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'encargo';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Descripcion',
        'Indicaciones',
        'Direccion_Id',
        'Persona_Id',
        'Usuario_Id',
        'Estado',
    ];

    //hasOne
    public function direccion()
    {
        return $this->hasOne('App\Models\Direccion', 'id', 'Direccion_Id');
    }
    
    public function persona()
    {
        return $this->hasOne('App\Models\Persona_Envio', 'id', 'Persona_Id');
    }

    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }
}
