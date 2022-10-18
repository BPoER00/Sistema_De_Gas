<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camion extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'camion';

    //llave primaria
    protected $primaryKey = 'id';

    //campos a utilizar
    protected $fillable = [
        'Descripcion',
        'Usuario_Id',
        'Peso_Id',
        'Categoria_Camiones_Uso_Id',
        'Marca_Id',
        'Tipo_Camion_Id',
        'Rueda_Camion_Id',
        'Tipo_Camion_Mercaderia_Id',
        'Tamanio_Id',
        'Uso_Camion_Id',
        'Estado',        
    ];

    //hasOne
    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_Id');
    }

    public function peso()
    {
        return $this->hasOne('App\Models\Peso', 'id', 'Peso_Id');
    }

    public function categoria_camion_uso()
    {
        return $this->hasOne('App\Models\Categoria_Camion_Uso', 'id', 'Categoria_Camiones_Uso_Id');
    }

    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'Marca_Id');
    }

    public function tipo_camion()
    {
        return $this->hasOne('App\Models\Tipo_Camion', 'id', 'Tipo_Camion_Id');
    }

    public function rueda_camion()
    {
        return $this->hasOne('App\Models\Rueda_Camion', 'id', 'Rueda_Camion_Id');
    }

    public function tipo_camion_mercaderia()
    {
        return $this->hasOne('App\Models\Tipo_Camion_Mercaderia', 'id', 'Tipo_Camion_Mercaderia_Id');
    }

    public function tamanio()
    {
        return $this->hasOne('App\Models\Tamanio', 'id', 'Tamanio_Id');
    }

    public function uso_camion()
    {
        return $this->hasOne('App\Models\Uso_Camion', 'id', 'Uso_Camion_Id');
    }

    //scope
    public function scopeActivo($query)
    {
        return $query->where('estado', '=', self::ESTADO_ACTIVO);
    }
}
