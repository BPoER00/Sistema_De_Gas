<?php

namespace App\actions\Usuario;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class EliminarUsuarioAction
{
    protected $actionBuscarUsuario;

    public function __construct(BuscarUsuarioAction $actionBuscarUsuario)
    {
        $this->actionBuscarUsuario = $actionBuscarUsuario;
    }

    public function execute($id)
    {
        $usuario = $this->actionBuscarUsuario->execute($id);
        if(!$usuario)
        {
            throw new Exception('El Usuario No Existe');
        }

        DB::beginTransaction();
        try
        {
            $usuario->estado = User::ESTADO_ELIMINADO;
            $usuario->deleted_at = now();
            $usuario->update();

            DB::commit();
            return true;
        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return false;
    }
}