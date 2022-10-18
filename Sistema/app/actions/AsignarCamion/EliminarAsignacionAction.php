<?php

namespace App\actions\AsignarCamion;

use App\Models\Asignacion_Camion;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class EliminarAsignacionAction
{
    protected $model;
    protected $buscarAsignacionAction;

    public function __construct(BuscarAsignacionAction $buscarAsignacionAction, Asignacion_Camion $model)
    {
        $this->model = $model;
        $this->buscarAsignacionAction = $buscarAsignacionAction;
    }

    public function execute($id)
    {
        DB::beginTransaction();
        try
        {
            $asignacion = $this->buscarAsignacionAction->execute($id);

            if(!$asignacion)
            {
                throw new Exception('No se pudo encontrar la asignacion.');
            }

            if ( $asignacion->estado == $this->model::ESTADO_ELIMINADO ){
                throw new Exception('La asignacion ya se encuentra eliminada.');
            }

            $asignacion->update($asignacion);
            DB::commit();

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }        
    }
}