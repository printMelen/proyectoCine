<?php
class Logout
{
    public static function logout()
    {
        $_SESSION = [];
        setcookie(session_name(), '', time() - 3600);
        session_destroy();
    }
}