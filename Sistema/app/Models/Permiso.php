<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'permiso';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Descripcion',
        'Roles_Id',
        'Modulo_Id',
        'Accion_Id',
    ];

    //hasOne
    public function rol()
    {
        return $this->hasOne('App\Models\Roles', 'id', 'Roles_Id');
    }

    public function modulo()
    {
        return $this->hasOne('App\Models\Modulo', 'id', 'Modulo_Id');
    }

    public function accion()
    {
        return $this->hasOne('App\Models\Accion', 'id', 'Accion_Id');
    }

}
