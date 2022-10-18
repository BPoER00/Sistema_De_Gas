<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chofer extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'chofer';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Documento_Identificacion',
        'Nombre',
        'Apellido',
        'Fecha_Nacimiento',
        'Licencia',
        'Tipo_Licencia',
        'Fecha_Vencimiento',
        'Telefono',
        'Email',
        'Estado_Civil_Id',
        'Etnia_Id',
        'Usuario_Id',
        'Estado',        
    ];

    //hasOne
    public function estado_civil()
    {
        return $this->hasOne('App\Models\Estado_Civil', 'id', 'Estado_Civil_Id');
    }

    public function etnia()
    {
        return $this->hasOne('App\Models\Etnia', 'id', 'Etnia_Id');
    }

    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }

    //scope

    public function scopeActivo($query)
    {
        return $query->where('estado', '=', self::ESTADO_ACTIVO);
    }

}
