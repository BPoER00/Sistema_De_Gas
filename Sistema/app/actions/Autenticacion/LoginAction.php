<?php

namespace App\actions\Autenticacion;

use App\Models\User;
use App\Utils\UtileriaArreglos;
use Exception;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LoginAction
{
    protected $model;
    protected $actionCrearToken;
    
    public function __construct(User $model, CrearTokenAction $actionCrearToken)
    {
        $this->model = $model;
        $this->actionCrearToken = $actionCrearToken;
    }

    public function execute($data)
    {
        try
        {
            $data_username = UtileriaArreglos::obtenerValorClaveArray($data, 'User');
            $data_password = UtileriaArreglos::obtenerValorClaveArray($data, 'password');

            if(!$data_username || !$data_password)
            {
                throw new Exception('Ingrese Usuario y Password correctamente');
            }

            if (!Auth::attempt([
                'User' => $data_username,
                'password' => $data_password
            ], false)){
                throw new Exception('Credenciales no validas.');
            }

            $usuario = Auth::user();
            if(!$usuario) throw new Exception('No se pudo obtener al usuario atenticando');


            $data_token = array (
                'id' => $usuario->id,
            );

            // dd($data_token);
            try
            {
                $token_publico = $this->actionCrearToken->execute($data_token);
            }catch(Exception|Throwable $e)
            {
                throw new Exception('Error creando token: '. $e->getMessage());
            }

            $usuario['tokenPublico'] = $token_publico;

            return $usuario;
        }catch(Exception|Throwable $e)
        {
            throw new Exception('Error creando token: '. $e->getMessage());
        }
    }
}