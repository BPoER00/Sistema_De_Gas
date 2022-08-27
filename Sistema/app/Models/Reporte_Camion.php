<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reporte_Camion extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'reporte_camion';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Gasto_Gas',
        'Galones',
        'Factura_No',
        'Descripcion',
        'Asignacion_Camion_Id',
        'Usuario_Id',
        'Estado',        
    ];

    //hasOne
    public function asignacion()
    {
        return $this->hasOne('App\Models\Asignacion_Camion', 'id', 'Asignacion_Camion_Id');
    }
    
    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }
}
