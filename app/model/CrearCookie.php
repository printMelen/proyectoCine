<?php
class CrearCookie{
    public static function crear($email){
        setcookie('correoUsuario', $email, time()+60*30, '/cookies/', 'http://localhost/dwes/proyectoCine/', false, true);
    }
}