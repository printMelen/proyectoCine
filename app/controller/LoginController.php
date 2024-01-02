<?php
class LoginController
{
    public static function inicio()
    {
        ViewController::cargarVista("loginBack");
        
    }
    public static function comprobar(){
        Login::comprobar();
    }
}
