<?php

class ReservarButacasController
{
    public static function inicio()
    {
        // Recibir datos del cliente
        if (self::comprobar()) {
            $_SESSION["mostrada"]=null;
            $_SESSION["qr"]=null;
            if (Reservar::insertar()) {
                $_SESSION["mostrada"]=0;
                ViewController::cargarVista("tablaQr");
                $_SESSION["mostrada"]=1;
                $nombreRandom="./pdf/factura".bin2hex(random_bytes(5)).".pdf";
                $_SESSION['pdf']=$nombreRandom;
                GenerarPDF::generarPDF("factura.pdf",$nombreRandom);
            }
        } else {
            header("Location: http://143.47.43.204:8080/alvaro/proyectoCine/index.php?peticion=login");
            exit();
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
