<?php

namespace App\actions\Chofer;

use App\Models\Chofer;

class BuscarChoferAction
{
    protected $model;

    public function __construct(Chofer $model)
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