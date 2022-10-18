<?php

namespace App\actions\Chofer;

use App\Models\Chofer;

class ObtenerChoferAction
{
    protected $model;
    
    public function __construct(Chofer $model)
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