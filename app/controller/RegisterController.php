<?php
class RegisterController
{
    public static function inicio()
    {
        ViewController::cargarVista("loginBack");
        
    }
    public static function completado(){
        Register::comprobar();
        ViewController::cargarVista("loginBack");
    }
}
