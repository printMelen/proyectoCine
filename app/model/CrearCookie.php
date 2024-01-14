<?php
class CrearCookie{
    public static function crear($email,$nombre){
        setcookie('correoUsuario', $email, 0);
        setcookie('nombre', $nombre, 0);
    }
}