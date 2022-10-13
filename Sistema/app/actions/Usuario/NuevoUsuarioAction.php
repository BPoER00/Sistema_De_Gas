<?php

namespace App\actions\Usuario;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class NuevoUsuarioAction
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function execute($data)
    {
        DB::beginTransaction();
        try
        {
            $data['estado'] = $this->model::ESTADO_ACTIVO;
            $data['password'] = Hash::make($data['password']);

            $usuario = $this->model::create($data);
            DB::commit(); 

            return $usuario;
        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return null;
    }
}
