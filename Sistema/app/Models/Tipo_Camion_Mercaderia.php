<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_Camion_Mercaderia extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'tipo_camion_mercaderia';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Usuario_Id',
        'Estado',
    ];

    //hasOne
    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }
}
