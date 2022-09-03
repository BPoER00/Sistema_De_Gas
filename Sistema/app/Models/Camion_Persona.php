<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camion_Persona extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'camion_persona';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Descripcion',
        'Camiones_Id',
        'Chofer_Id',
        'Usuario_Id',
        'Estado',
    ];

    //hasOne
    public function camion()
    {
        return $this->hasOne('App\Models\Camion', 'id', 'Camiones_Id');
    }

    public function chofer()
    {
        return $this->hasOne('App\Models\Chofer', 'id', 'Chofer_Id');
    }

    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }
}
