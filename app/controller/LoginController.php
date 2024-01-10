<?php
class LoginController
{
    public static function inicio()
    {
        LoginController::comprobar();
        // ViewController::cargarVista("loginBack");
        
    }
    public static function comprobar(){
        if (Login::comprobar()) {
            ViewController::cargarVista("index".$_SESSION["rol"]);
        }else{
            ViewController::cargarVista("loginBack");
        }
    }
}
