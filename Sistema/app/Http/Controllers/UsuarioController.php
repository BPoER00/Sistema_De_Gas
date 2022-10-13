<?php

namespace App\Http\Controllers;

use App\actions\Usuario\NuevoUsuarioAction;
use App\Http\Requests\Usuario\UsuarioNuevoRequest;
use App\Utils\FormatoApiRespuesta;
use Exception;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Throwable;

class UsuarioController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

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

    public function update()
    {

    }

    public function destroy()
    {

    }
}
