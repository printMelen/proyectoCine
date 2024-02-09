<?php

class ReservarButacasController
{
    public static function inicio()
    {
        // Recibir datos del cliente
        if (self::comprobar()) {
            $_SESSION["mostrada"]=null;
            if (Reservar::insertar()) {
                $_SESSION["mostrada"]=1;
                GenerarPDF::generarPDF("factura.pdf");
                $_SESSION["mostrada"]=0;
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
