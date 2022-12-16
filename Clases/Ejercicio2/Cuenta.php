<?php
class Cuenta 
{
    private $nombreCliente;
    private $numeroCuenta;
    private $tipoInteres;
    private $saldo;

    function __construct($nombreCliente, $numeroCuenta, $tipoInteres, $saldo) 
    {
        $this->nombreCliente = $nombreCliente;
        $this->numeroCuenta = $numeroCuenta;
        $this->tipoInteres = $tipoInteres;
        $this->saldo = $saldo;
    }

    function get_nombreCliente()
    {
        return $this->nombreCliente;
    }

    function set_nombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    function get_numeroCuenta()
    {
        return $this->numeroCuenta;
    }

    function set_numeroCuenta($numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;
    }
    function get_tipoInteres()
    {
        return $this->tipoInteres;
    }

    function set_tipoInteres($tipoInteres)
    {
        $this->tipoInteres = $tipoInteres;
    }
    function get_saldo()
    {
        return $this->saldo;
    }

    function set_saldo($saldo)
    {
        $this->saldo = $saldo;
    }

    function ingreso($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;         
            return true;
        }
        else {
            return false;
        }
    }

    function reintegro($cantidad) {
        if ($cantidad > 0 || $this -> saldo >= $cantidad) {
            $this->saldo -= $cantidad;         
            return true;
        }
        else {
            return false;
        }
    }

    function transferencia ($cuenta, $cantidad) {
        if ($this -> reintegro($cantidad)){
            $cuenta->ingreso($cantidad);
            return true;
        }
        else {
            return false;
        }
    }
}
?>