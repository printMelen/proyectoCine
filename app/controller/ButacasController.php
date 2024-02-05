<?php
class ButacasController
{
    public static function inicio()
    {
        $url = URL."/horas";
        $response = file_get_contents($url);
        $horas = json_decode($response, true);
        $_SESSION['horas'] = $horas;
        if (isset($_POST["fechas"])) {
            ViewController::cargarVista("butacas");
        }
    }
}