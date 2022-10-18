<?php

namespace App\actions\Camion;

use App\Models\Camion;

class BuscarCamionAction
{
    protected $model;

    public function __construct(Camion $model)
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