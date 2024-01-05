<?php
class CrearCookie{
    public static function crear($email){
        setcookie('correoUsuario', $email, time()+60*30);
    }
}