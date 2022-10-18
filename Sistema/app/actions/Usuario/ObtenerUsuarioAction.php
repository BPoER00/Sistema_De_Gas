<?php

namespace App\actions\Usuario;

use App\Models\User;

class ObtenerUsuarioAction
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function execute($id = null)
    {
        $query = $this->model::query()
            ->activo()
            ->orderBy('id', 'ASC');

            if($id)
            {
                
            }
        return $query->paginate(15);
    }
}