<?php
class SesionesController
{
    public static function inicio()
    {
        $url = URL."/peliculas";
        $response = file_get_contents($url);
        $_SESSION['peliculasSesiones'] = json_decode($response, true);
        $url = URL."/horas";
        $response = file_get_contents($url);
        $_SESSION['horasSesiones'] = json_decode($response, true);
        $url = URL."/salas";
        $response = file_get_contents($url);
        $_SESSION['salasSesiones'] = json_decode($response, true);
        SesionesController::comprobar();
    }
    public static function comprobar(){
        if (Sesiones::comprobar()) {
            $_SESSION["logeado"]=true;
            ViewController::cargarVista("index".$_SESSION["rol"]);
        }else{
            ViewController::cargarVista("indexAdmin");
        }
    }
}