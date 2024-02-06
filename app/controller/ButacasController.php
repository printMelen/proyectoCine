<?php
class ButacasController
{
    public static function inicio()
    {
        $datos=explode(",",$_POST["fechas"]);
        echo $datos[2];
        setcookie("idSesion", $datos[2]);
        $url = URL."/horas";
        $response = file_get_contents($url);
        $horas = json_decode($response, true);
        $_SESSION['horas'] = $horas;
        
        if (isset($_POST["fechas"])) {
            ViewController::cargarVista("butacas");
        }
    }
}