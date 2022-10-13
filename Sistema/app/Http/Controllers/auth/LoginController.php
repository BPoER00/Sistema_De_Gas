<?php

namespace App\Http\Controllers\auth;

use App\actions\Autenticacion\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Utils\FormatoApiRespuesta;
use Exception;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Throwable;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginAction $action)
    {
        $formatoApi = new FormatoApiRespuesta();

        try
        {
            $UsuarioAtenticado = $action->execute($request->validated());

            $formatoApi->setCodigo(FormatoApiRespuesta::CODIGO_EXITOSO);
            $formatoApi->setData($UsuarioAtenticado);
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
}
