<?php

namespace App\Utils;

use Exception;
use Throwable;

class UtileriaArreglos
{
    public static function obtenerValorClaveArray($arreglo, $clave, $default = '')
    {
        try
        {
            return $arreglo ? (array_key_exists($clave, $arreglo) ? $arreglo[$clave] : $default) : $default;
        }catch(Exception|Throwable $e)
        {
            return $default;
        }
    }

    public static function eliminarIndiceClaveArray($arreglo, $clave_eliminar)
    {
        try
        {
            if(array_key_exists($clave_eliminar, $arreglo))
            {
                unset($arreglo[$clave_eliminar]);
            }

            return $arreglo;
        }catch(Exception|Throwable $e)
        {
            return $arreglo;
        }
    }
}