<?php

namespace App\actions\Usuario;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class ActualizarUsuarioAction
{
    protected $model;
    protected $actionBuscarUsuario;

    public function __construct(User $model, BuscarUsuarioAction $actionBuscarUsuario)
    {
        $this->model = $model;
        $this->actionBuscarUsuario = $actionBuscarUsuario;
    }

    public function execute($id, $data)
    {
        DB::beginTransaction();

        try
        {
            $usuario = $this->actionBuscarUsuario->execute($id);

            if(!$usuario)
            {
                throw new Exception('No se pudo encontrar al usuario');
            }

            if ( $usuario->estado == $this->model::ESTADO_ELIMINADO ){
                throw new Exception('El usuario ya se encuentra eliminado.');
            }

            $usuario->update($data);
            DB::commit();

            return $usuario;
        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}