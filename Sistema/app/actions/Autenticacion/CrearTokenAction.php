<?php

namespace App\actions\Autenticacion;

use App\actions\Usuario\BuscarUsuarioAction;
use App\Models\User;
use App\Utils\UtileriaArreglos;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class CrearTokenAction
{
    protected $model;
    protected $actionBuscarUsuario;

    public function __construct(User $model, BuscarUsuarioAction $actionBuscarUsuario)
    {
        $this->model = $model;
        $this->actionBuscarUsuario = $actionBuscarUsuario;
    }

    public function execute($data)
    {
        DB::beginTransaction();
        try
        {
            $data_id_usuario = UtileriaArreglos::obtenerValorClaveArray($data, 'id', null);
            if(!$data_id_usuario)
            {
                throw new Exception('Debe indicar el codigo del usuario');
            }

            $user = $this->actionBuscarUsuario->execute($data_id_usuario);

            if(!$user)
            {
                throw new Exception('No se pudo encontrar el usuario.');
            }
            
            $user->tokens()->delete();


            $token = $user->createToken('Public Token');

            $token_publico = $token->plainTextToken;

            DB::commit();

            return $token_publico;

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}