<?php

namespace App\actions\Usuario;

use App\Models\User;

class BuscarUsuarioAction
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function execute($id)
    {
        return $this->model
            ->where('id', '=', $id)
            ->first();
    }
}