<?php
class RegisterController
{
    public static function inicio()
    {
        RegisterController::completado();
    }
    public static function completado()
    {
        if (Register::comprobar()) {
            ViewController::cargarVista("validar");
            session_destroy();
        } else {
            ViewController::cargarVista("loginBack");
        }
    }
}
