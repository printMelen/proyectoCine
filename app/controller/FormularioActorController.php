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
        if (FormularioActor::comprobar()) {
            // $_SESSION["logeado"]=true;
            FormularioActor::devolverElenco();
            FormularioActor::separar();
            ViewController::cargarVista("indexAdmin");
        }else{
            ViewController::cargarVista("indexAdmin");

        }
        // }else{
            // $_SESSION["logeado"]=false;
        //     ViewController::cargarVista("indexAdmin");
        // }
    }
}
