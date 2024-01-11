<?php
class FormularioActorController
{
    public static function inicio()
    {
        // $_SESSION['generos'] = Generos::sacarGeneros();
        FormularioActorController::comprobar();
        // ViewController::cargarVista("loginBack");
        
    }
    public static function comprobar(){
        // FormularioActor::comprobar()
        // if () {
            // $_SESSION["logeado"]=true;
            ViewController::cargarVista("indexAdmin");
        // }else{
            // $_SESSION["logeado"]=false;
        //     ViewController::cargarVista("indexAdmin");
        // }
    }
}
