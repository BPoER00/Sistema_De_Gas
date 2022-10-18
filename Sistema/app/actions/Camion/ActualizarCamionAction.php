<?php

namespace App\actions\Camion;

use App\Models\Camion;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class ActualizarCamionAction
{
    protected $buscarCamionAction;
    protected $model;

    public function __construct(BuscarCamionAction $buscarCamionAction, Camion $model)
    {
        $this->buscarCamionAction = $buscarCamionAction;
        $this->model = $model;
    }

    public function execute($id, $data)
    {
        DB::beginTransaction();
        try
        {
            $camion = $this->buscarCamionAction->execute($id);

            if(!$camion)
            {
                throw new Exception('No se pudo encontrar al camion');
            }

            $camion->update($data);
            DB::commit();

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
 
        }
    }
}