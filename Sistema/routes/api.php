<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function(){
    Route::get('/', function(){
        return response()->json(array(
            'Version Laravel' => app()->version(),
            'Nombre Api' => 'Servicio Camiones',
            'Curso' => 'Desarrollo Web',
            'Estudiante' => 'Bryan Emanuel Paz Ramirez',
            'Carne' => '1190-19-3929',
            'Catedratico' => 'Jose Vinicio Pena Roman'
        ), 200);
    });
});

Route::post('/Login', [App\Http\Controllers\auth\LoginController::class, 'login']);

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function()
    {
        Route::apiResource('usuario', App\Http\Controllers\UsuarioController::class);
        Route::apiResource('chofer', App\Http\Controllers\ChoferController::class);
    });