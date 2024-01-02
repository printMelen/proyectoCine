<?php
class Validar{
    public static function validar(){
        $db = Conectar::conexion();
        $sql = "UPDATE usuariosc SET activo = '1' WHERE 'correo' = ?";
        $resultado = $db->prepare($sql);
        $resultado->bindParam(1, $_COOKIE['correoUsuario'], PDO::PARAM_STR);
        $resultado->execute(); 
        $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
        $resultado = null; // obligado para cerrar la conexión
        $db = null;
    }
}