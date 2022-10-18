<?php

namespace App\Http\Controllers;

use App\actions\Chofer\ActualizarChoferAction;
use App\actions\Chofer\BuscarChoferAction;
use App\actions\Chofer\EliminarChoferAction;
use App\actions\Chofer\NuevoChoferAction;
use App\actions\Chofer\ObtenerChoferAction;
use App\actions\Usuario\ObtenerUsuarioAction;
use App\Http\Requests\Chofer\ChoferActualizarRequest;
use App\Http\Requests\Chofer\ChoferNuevoRequest;
use App\Models\Chofer;
use App\Utils\FormatoApiRespuesta;
use Exception;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Response as FacadesResponse;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ObtenerChoferAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();
        try
        {
            $chofer = $action->execute();

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($chofer);
            $formatoApi->setMensaje('Listado de chofer registrados obtenidos');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);
        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error Al Obtener Los Datos');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ]
                ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ChoferNuevoRequest $request, NuevoChoferAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();
        try
        {
            $chofer = $action->execute($request->validated());

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($chofer);
            $formatoApi->setMensaje('Chofer Registrado Correctamente.');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);
        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error Al Guardar EL Chofer');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ]
                ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function show($id, BuscarChoferAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();
        try
        {
            $chofer = $action->execute($id);

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($chofer);
            $formatoApi->setMensaje('Chofer Obtenido Correctamente.');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);
        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error Al Obtener EL Chofer');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ]
                ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function update(ChoferActualizarRequest $request, $id, ActualizarChoferAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();
        try
        {
            $chofer = $action->execute($id, $request->validated());

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($chofer);
            $formatoApi->setMensaje('Chofer Actualizado Correctamente.');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);
        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error Al Actualizar EL Chofer');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ]
                ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, EliminarChoferAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();
        try
        {
            $chofer = $action->execute($id);

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($chofer);
            $formatoApi->setMensaje('Chofer Eliminado Correctamente.');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);
        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error Al Eliminar EL Chofer');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ]
                ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());  
    }
}
