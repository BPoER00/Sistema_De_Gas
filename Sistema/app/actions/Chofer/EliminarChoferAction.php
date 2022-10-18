<?php

namespace App\actions\Chofer;

use App\actions\Usuario\BuscarUsuarioAction;
use App\Models\Chofer;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class EliminarChoferAction
{
    protected $model;
    protected $buscarChoferAction;

    public function __construct(BuscarUsuarioAction $buscarChoferAction, Chofer $model)
    {
        $this->model = $model;
        $this->buscarChoferAction = $buscarChoferAction;
    }

    public function execute($id)
    {
        DB::beginTransaction();
        try
        {
            $chofer = $this->buscarChoferAction->execute($id);

            if(!$chofer)
            {
                throw new Exception('No se pudo encontrar al chofer');
            }

            if ( $chofer->estado == $this->model::ESTADO_ELIMINADO ){
                throw new Exception('El chofer ya se encuentra eliminado.');
            }

            $chofer->update($chofer);
            DB::commit();

        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }        
    }
}