<?php
class ValidarController
{
    public static function validar()
    {
        Validar::validar();
        $_SESSION["logeado"]=true;
        $_SESSION["rol"]="Usuario";
        $_SESSION["nombre"]=$_COOKIE['nombre'];
        $_SESSION['avatar']=Login::devolverAvatar($_COOKIE['correoUsuario'])[0]['avatar'];
        ViewController::cargarVista("correoValidado");
    }
}