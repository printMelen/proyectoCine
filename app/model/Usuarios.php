<?php

class Usuarios
{
    public static function getTodosUsuarios()
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM usuariosC";
        $resultado = $db->query($sql);

        if ($resultado) {
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
