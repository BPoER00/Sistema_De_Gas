<?php

namespace App\actions\AsignarCamion;

use App\Models\Asignacion_Camion;

class BuscarAsignacionAction
{
    protected $model;

    public function __construct(Asignacion_Camion $model)
    {
        $this->model = $model;
    }

    public function execute($id)
    {
        $query = $this->model::query()
                    ->where('id', '=', $id);

        return $query->first();
    }
}