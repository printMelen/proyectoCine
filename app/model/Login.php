<?php
class Login
{
    public static function comprobar()
    {
        $email = Register::clean_input($_POST["email"]);
        $password = Register::clean_input($_POST["password"]);
        try {
            $db = Conectar::conexion();
            $sql = "SELECT correo,hash_pass,activo,rol FROM usuariosc where correo=?";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(1, $email, PDO::PARAM_STR);
            
            $resultado->execute(); 
            Login::dentro($resultado->fetchAll(PDO::FETCH_ASSOC));
            $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
            $resultado = null; // obligado para cerrar la conexión
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
    }
    public static function dentro($array){
        
        if (count($array)!=0&&password_verify($_POST['password'],$array[0]["hash_pass"])&&$array[0]['activo']==1) {
            if ($array[0]['rol']=='cliente') {
                ViewController::cargarVista("indexUsuario");
            }else{
                ViewController::cargarVista("indexAdmin");

            } 
        }else{
            echo "Correo o Contraseña incorrecto";
        }
    }
}
