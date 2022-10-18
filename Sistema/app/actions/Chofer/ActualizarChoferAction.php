<?php

namespace App\actions\Chofer;

use App\actions\Usuario\BuscarUsuarioAction;
use App\Models\Chofer;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class ActualizarChoferAction
{
    protected $buscarChoferAction;
    protected $model;

    public function __construct(BuscarUsuarioAction $buscarChoferAction, Chofer $model)
    {
        $this->buscarChoferAction = $buscarChoferAction;
        $this->model = $model;
    }

    public function execute($id, $data)
    {
        DB::beginTransaction();
        try
        {
            $chofer = $this->buscarChoferAction->execute($id);

            if(!$chofer)
            {
                throw new Exception('No se pudo encontrar al chofer');
            }

            $chofer->update($data);
            DB::commit();

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
 
        }
    }
}