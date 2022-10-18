<?php

namespace App\Http\Controllers;

use App\actions\Usuario\ActualizarUsuarioAction;
use App\actions\Usuario\BuscarUsuarioAction;
use App\actions\Usuario\EliminarUsuarioAction;
use App\actions\Usuario\NuevoUsuarioAction;
use App\actions\Usuario\ObtenerUsuarioAction;
use App\Http\Requests\Usuario\UsuarioActualizarRequest;
use App\Http\Requests\Usuario\UsuarioNuevoRequest;
use App\Utils\FormatoApiRespuesta;
use Exception;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Throwable;

class UsuarioController extends Controller
{
    public function index(Request $request, ObtenerUsuarioAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();
        try
        {
            $Usuario = $action->execute($request->get('id'));

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($Usuario);
            $formatoApi->setMensaje('Usuarios Obtenidos');
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

    public function show($id, BuscarUsuarioAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();

        try
        {
            $usuario = $action->execute($id);
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($usuario);
            $formatoApi->setMensaje('Usuarios Obtenidos');
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

    public function store(UsuarioNuevoRequest $request, NuevoUsuarioAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();

        try
        {
            $usuarioCreado = $action->execute($request->validated());

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($usuarioCreado);
            $formatoApi->setMensaje('Usuario autenticado correctamente');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);

        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error login.');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ],
            ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);

        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());
    }

    public function update(UsuarioActualizarRequest $request, $id, ActualizarUsuarioAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();

        try
        {
            $usuarioCreado = $action->execute($id, $request->validated());

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($usuarioCreado);
            $formatoApi->setMensaje('Usuario Actualizado correctamente');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);

        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error login.');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ],
            ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }

        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());
    }

    public function destroy($id, EliminarUsuarioAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();

        try
        {
            $usuarioCreado = $action->execute($id);

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($usuarioCreado);
            $formatoApi->setMensaje('Usuario Actualizado correctamente');
            $formatoApi->setErrores(array());
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_OK);
        }catch(Exception|Throwable $e)
        {
            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_FAILLDO);
            $formatoApi->setData(null);
            $formatoApi->setMensaje('Error login.');
            $formatoApi->setErrores(array(
                'error' => [
                    $e->getMessage(),
                ],
            ));
            $formatoApi->setCodigoHttp(HttpResponse::HTTP_UNAUTHORIZED);
        }
        return FacadesResponse::json($formatoApi->mapear(), $formatoApi->getCodigoHttp());
    }
}
