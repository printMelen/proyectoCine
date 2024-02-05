<?php
echo $_COOKIE["butacas"]; 
class ReservarButacasController
{
    public static function inicio()
    {
// Recibir datos del cliente
    

        var_dump($_POST);
        echo $_SESSION['nombre']."<br>";
        echo "Butacas compradas"."<br>";
        //obten he imprime la fecha de hoy
        $fecha = date("Y-m-d");
        echo $fecha;
    }
}