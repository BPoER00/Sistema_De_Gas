<?php

namespace App\actions\Camion;

use App\Models\Camion;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class NuevoCamionAction
{
    protected $model;

    public function __construct(Camion $model)
    {
        $this->model = $model;
    }

    public function execute($data)
    {
        DB::beginTransaction();
        try
        {
            $camion = $this->model::create($data);
            DB::commit();

            return $camion;
        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}