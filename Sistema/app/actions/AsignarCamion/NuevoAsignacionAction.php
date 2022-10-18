<?php

namespace App\actions\AsignarCamion;

use App\Models\Asignacion_Camion;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class NuevoAsignacionAction
{
    protected $model;

    public function __construct(Asignacion_Camion $model)
    {
        $this->model = $model;
    }

    public function execute($data)
    {
        DB::beginTransaction();
        
        try
        {
            $asignacion = $this->model::create($data);
            DB::commit(); 

            return $asignacion;

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}