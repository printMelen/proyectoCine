<?php
class FormularioPeliController
{
    public static function inicio()
    {
        $_SESSION['generos'] = Generos::sacarGeneros();
        FormularioPeliController::comprobar();
        // ViewController::cargarVista("loginBack");
        
    }
    public static function comprobar(){
        if (FormularioPeli::comprobar()) {
            $_SESSION["logeado"]=true;
            ViewController::cargarVista("index".$_SESSION["rol"]);
        }else{
            // $_SESSION["logeado"]=false;
            ViewController::cargarVista("indexAdmin");
        }
    }
}