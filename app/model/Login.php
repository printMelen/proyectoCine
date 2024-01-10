<?php
class Login
{
    public static function comprobar()
    {
        $devolver=false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = Register::clean_input($_POST["email"]);
            $password = Register::clean_input($_POST["password"]);
            try {
                $db = Conectar::conexion();
                $sql = "SELECT nombre,correo,hash_pass,activo,rol,avatar FROM usuariosc where correo=?";
                $resultado = $db->prepare($sql);
                $resultado->bindParam(1, $email, PDO::PARAM_STR);
                
                $resultado->execute(); 
                $devolver=Login::dentro($resultado->fetchAll(PDO::FETCH_ASSOC));
                $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
                $resultado = null; // obligado para cerrar la conexión
                $db = null; 
            } catch (PDOException $e) {
                echo "<br>Error: " . $e->getMessage();  
                echo "<br>Línea del error: " . $e->getLine();  
                echo "<br>Archivo del error: " . $e->getFile();
            }
        }
        return $devolver;
    }
    public static function dentro($array){
        $devolver=false;
        if (count($array)!=0&&password_verify($_POST['password'],$array[0]["hash_pass"])&&$array[0]['activo']==1) {
            $devolver=true;
            $_SESSION['nombre']=$array[0]['nombre'];
            $_SESSION['avatar']=$array[0]['avatar'];
            if ($array[0]['rol']=='cliente') {
                $_SESSION["rol"]="Usuario";
                // ViewController::cargarVista("indexUsuario");
            }else{
                $_SESSION["rol"]="Admin";
                // ViewController::cargarVista("indexAdmin");
            } 
        }
        return $devolver;
    }
}
