<?php

namespace App\actions\Chofer;

use App\Models\Chofer;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class NuevoChoferAction
{
    protected $model;

    public function __construct(Chofer $model)
    {
        $this->model = $model;
    }

    public function execute($data)
    {
        DB::beginTransaction();
        
        try
        {
            $chofer = $this->model::create($data);
            DB::commit(); 

            return $chofer;

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}