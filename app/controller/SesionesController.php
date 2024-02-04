<?php
class SesionesController
{
    public static function inicio()
    {
        $url = "http://localhost:80/dwes/proyectoCine/api/v1/cine/peliculas";
        $response = file_get_contents($url);
        $_SESSION['peliculasSesiones'] = json_decode($response, true);
        $url = "http://localhost:80/dwes/proyectoCine/api/v1/cine/horas";
        $response = file_get_contents($url);
        $_SESSION['horasSesiones'] = json_decode($response, true);
        $url = "http://localhost:80/dwes/proyectoCine/api/v1/cine/salas";
        $response = file_get_contents($url);
        $_SESSION['salasSesiones'] = json_decode($response, true);
        SesionesController::comprobar();
    }
    public static function comprobar(){
        if (SesionesController::comprobar()) {
            $_SESSION["logeado"]=true;
            ViewController::cargarVista("index".$_SESSION["rol"]);
        }else{
            ViewController::cargarVista("indexAdmin");
        }
    }
}