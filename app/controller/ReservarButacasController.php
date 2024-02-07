<?php

class ReservarButacasController
{
    public static function inicio()
    {
        // Recibir datos del cliente
        if (self::comprobar()) {
            if (Reservar::insertar()) {
                ViewController::cargarVista("tablaQr");
            }
        } else {
            echo "No estas logeado";
        }
    }
    public static function comprobar()
    {
        $logeado = false;
        if ($_SESSION['logeado'] == true) {
            $logeado = true;
        }
        return $logeado;
    }
}
