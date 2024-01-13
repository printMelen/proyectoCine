<?php
class ValidarController
{
    public static function validar()
    {
        Validar::validar();
        ViewController::cargarVista("correoValidado");
    }
}