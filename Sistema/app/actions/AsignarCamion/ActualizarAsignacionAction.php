<?php

namespace App\actions\AsignarCamion;

use App\Models\Asignacion_Camion;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class ActualizarAsignacionAction
{
    protected $buscarAsignacionAction;
    protected $model;

    public function __construct(BuscarAsignacionAction $buscarAsignacionAction, Asignacion_Camion $model)
    {
        $this->buscarAsignacionAction = $buscarAsignacionAction;
        $this->model = $model;
    }

    public function execute($id, $data)
    {
        DB::beginTransaction();
        try
        {
            $asignacion = $this->buscarAsignacionAction->execute($id);

            if(!$asignacion)
            {
                throw new Exception('No se pudo encontrar la asignacion');
            }

            $asignacion->update($data);
            DB::commit();

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
 
        }
    }
}