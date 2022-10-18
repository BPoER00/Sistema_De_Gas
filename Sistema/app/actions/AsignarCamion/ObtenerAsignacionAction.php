<?php

namespace App\actions\AsignarCamion;

use App\Models\Asignacion_Camion;

class ObtenerAsignacionAction
{
    protected $model;

    public function __construct(Asignacion_Camion $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        $query = $this->model::query()
                    ->activo();

        return $query->paginate(15);
    }
}