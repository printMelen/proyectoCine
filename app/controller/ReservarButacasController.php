<?php
class ReservarButacasController
{
    public static function inicio()
    {
        echo $_SESSION['nombre']."<br>";
        echo "Butacas compradas"."<br>";
        //obten he imprime la fecha de hoy
        $fecha = date("Y-m-d");
        echo $fecha;
    }
}