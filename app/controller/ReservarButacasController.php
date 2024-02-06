<?php

class ReservarButacasController
{
    public static function inicio()
    {
// Recibir datos del cliente
        if (self::comprobar()) {
            echo $_SESSION['nombre']."<br>";
            $fecha = date("Y-m-d");
            echo "Butacas compradas"."<br>";
            QrController::generarQr("Usuario:".$_SESSION["nombre"]."Asientos:".$_COOKIE["butacas"]."Fecha:".$fecha);
        }else{
            echo "No estas logeado";
        }
    }
    public static function comprobar(){
        $logeado=false;
        if ($_SESSION['logeado'] == true) {
            $logeado= true;
        }
        return $logeado;
    }
}