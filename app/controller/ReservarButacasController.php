<?php

class ReservarButacasController
{
    public static function inicio()
    {
        // Recibir datos del cliente
        if (self::comprobar()) {
            if (Reservar::insertar()) {
                echo $_SESSION['nombre'] . "<br>";
                $fecha = date("Y-m-d");
                echo "Butacas compradas" . "<br>";
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
