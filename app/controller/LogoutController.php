<?php
class LogoutController
{
    public static function cerrar()
    {
        Logout::logout();
        $_SESSION["logeado"]=false;
        ViewController::cargarVista("indexUsuario");
    }
}
