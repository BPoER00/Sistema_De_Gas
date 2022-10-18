<?php

namespace App\actions\Camion;

use App\Models\Camion;

class ObtenerCamionAction
{
    protected $model;

    public function __construct(Camion $model)
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