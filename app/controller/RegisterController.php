<?php
class RegisterController
{
    public static function inicio()
    {
        // if ($_POST['Registrarme']) {
            
            RegisterController::completado();
        // } else {
            // ViewController::cargarVista("loginBack");
        // }
    }
    public static function completado(){
        // ViewController::cargarVista("loginBack");
        if (Register::comprobar()) {
            ViewController::cargarVista("validar");
            session_destroy();
        }else{
            ViewController::cargarVista("loginBack");
        }
    }
}
