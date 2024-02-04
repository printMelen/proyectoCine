<?php
class ButacasController
{
    public static function inicio()
    {
        $url = "http://143.47.43.204:8080/alvaro/proyectoCine/api/v1/cine/horas";
        $response = file_get_contents($url);
        $horas = json_decode($response, true);
        $_SESSION['horas'] = $horas;
        if (isset($_POST["fechas"])) {
            ViewController::cargarVista("butacas");
        }
    }
}