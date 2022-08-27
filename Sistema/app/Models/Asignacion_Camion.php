<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignacion_Camion extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'asignacion_camion';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Descripcion',
        'Encargo_Id',
        'Camion_Persona_Id',
        'Usuario_Id',
        'Estado',        
    ];

    //hasOne
    public function encargo()
    {
        return $this->hasOne('App\Models\Encargo', 'id', 'Encargo_Id');
    }

    public function camion_persona()
    {
        return $this->hasOne('App\Models\Camion_Persona', 'id', 'Camion_Persona_Id');
    }

    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }
}
