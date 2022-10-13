<?php

namespace App\Utils;

class FormatoApiRespuesta
{
    const CODIGO_EXITOSO = 1;
    const CODIGO_FAILLDO = 0;

    private $codigo;
    private $mensaje;
    private $errores;
    private $data;
    private $errores_no_controlados;
    private $codigoHttp;

    public function __construct()
    {
        $this->codigo = 0;
        $this->mensaje = '';
        $this->errores = array();
        $this->data = null;
        $this->errores_no_controlador = array();
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($value)
    {
        $this->mensaje = $value;
    }

    public function getErrores()
    {
        return $this->errores;
    }

    public function setErrores($value)
    {
        $this->errores = $value;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($value)
    {
        $this->data = $value;
    }

    public function getErroresNoControlados()
    {
        return $this->errores_no_controlados;
    }

    public function setErroresNoControlados($value)
    {
        $this->errores_no_controlados = $value;
    }

    public function getCodigoHttp()
    {
        return $this->codigoHttp;
    }

    public function setCodigoHttp($value)
    {
        $this->codigoHttp = $value;
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function mapear(): array
    {
        $respuesta = null;

        $respuesta['code'] = $this->getCodigo();
        $respuesta['message'] = $this->getMensaje();
        $respuesta['errors'] = $this->getErrores();
        $respuesta['data'] = $this->getData();

        return $respuesta;
    }

}