<?php
class DefaultController
{
    public static function inicio()
    {
        if (isset($_SESSION["rol"])) {
            ViewController::cargarVista("index".$_SESSION["rol"]);
        }else{
            ViewController::cargarVista("indexUsuario");
        }
    }
}
