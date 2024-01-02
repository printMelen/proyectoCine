<?php
class Login
{
    public static function comprobar()
    {
        $email = Register::clean_input($_POST["email"]);
        $password = Register::clean_input($_POST["password"]);
        $datos=[];
        try {
            $db = Conectar::conexion();
            $sql = "SELECT correo,hash_pass,activo FROM usuariosc where correo=?";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(1, $email, PDO::PARAM_STR);
            
            $resultado->execute(); 
            var_dump($resultado->fetchAll(PDO::FETCH_ASSOC));
            $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
            $resultado = null; // obligado para cerrar la conexión
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
    }
}
