<?php

namespace App\actions\Usuario;

use App\Models\User;

class ObtenerUsuario
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        $query = $this->model::query()
            ->activo()
            ->orderBy('id', 'ASC');

        return $query->paginate(15);
    }
}