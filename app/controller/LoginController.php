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
            $_SESSION["logeado"]=true;
            ViewController::cargarVista("index".$_SESSION["rol"]);
        }else{
            $_SESSION["logeado"]=false;
            ViewController::cargarVista("loginBack");
        }
    }
}
