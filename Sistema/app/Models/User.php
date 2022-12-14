<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    //Constantes de valores activo e inactivo
    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;


    //nombre de tabla
    protected $table = 'usuario';

    //llave primaria
    protected $primaryKey = 'id';

    protected $fillable = [
        'User',
        'email',
        'password',
        'Roles_Id',
        'Estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //hasOne
    public function rol()
    {
        return $this->hasOne('App\Models\Roles', 'id', 'Roles_Id');
    }

    //scope
    public function scopeActivo($query)
    {
        return $query->where('estado', '=', self::ESTADO_ACTIVO);
    }
}
