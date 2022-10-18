<?php

namespace App\actions\Camion;

use App\Models\Camion;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class EliminarCamionAction
{
    protected $model;
    protected $buscarCamionAction;

    public function __construct(BuscarCamionAction $buscarCamionAction, Camion $model)
    {
        $this->model = $model;
        $this->buscarCamionAction = $buscarCamionAction;
    }

    public function execute($id)
    {
        DB::beginTransaction();
        try
        {
            $camion = $this->buscarCamionAction->execute($id);

            if(!$camion)
            {
                throw new Exception('No se pudo encontrar al camion');
            }

            if ( $camion->estado == $this->model::ESTADO_ELIMINADO ){
                throw new Exception('El camion ya se encuentra eliminado.');
            }

            $camion->update($camion);
            DB::commit();

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }        
    }
}