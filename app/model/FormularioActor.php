<?php
class FormularioActor
{
    public static function comprobar()
    {
        $devolver=false;
        $_SESSION["error"]="";
        $errors[]="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nameElenco"])) {
                $_SESSION['error'] = "El campo Nombre es obligatorio.";
            }
        
            // Validar el campo Argumento
            if (empty($_POST["rolElenco"])) {
                $_SESSION['error'] = "El campo rol del elenco es obligatorio.";
            }
        
            // var_dump($_FILES["imagenElenco"]);
            if ($_FILES["imagenElenco"]['size']==0) {
                $_SESSION['error'] = "El campo imagen es obligatorio";
            }
            // var_dump($_FILES["imagenElenco"]);
            $imagen=FormularioActor::procesarImagen($_FILES["imagenElenco"]);
            if ($errors[0]==""&&$_SESSION['error']=="") {
                $devolver=true;
                FormularioActor::insertarActor(FormularioPeli::clean_input($_POST["nameElenco"]),FormularioPeli::clean_input($_POST["rolElenco"]),$imagen);
            }
        }
        return $devolver;
    }
    public static function insertarActor($nombre, $tipo, $imagen)
    {
        try {
            $db = Conectar::conexion();
            $sql = "INSERT INTO `personalc`(`nombre`, `tipo`, `imagen`) VALUES (?,?,?)";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(1, $nombre, PDO::PARAM_STR);
            $resultado->bindParam(2, $tipo, PDO::PARAM_STR);
            $resultado->bindParam(3, $imagen, PDO::PARAM_STR);
            $resultado->execute(); 
            
            $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
            $resultado = null; // obligado para cerrar la conexión
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        
    }
    public static function procesarImagen($imagen): ?string
    {
        $nombreImagen = NULL;
        if (isset($imagen["name"]) && $imagen["name"] != "") {
            $nombreImagen = FormularioActor::subirImagen($imagen);
        } else {
            $nombreImagen = "elenco.png";
        }
        return $nombreImagen;
    }

    // public static function  clean_input($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    public static function subirImagen($imagen): ?string
    {
        $nombreImagen = NULL;
        $directorioDestino = "app/view/images/elenco/";
        $extension = strtolower(pathinfo($imagen["name"], PATHINFO_EXTENSION));
        $nombre = strtolower(pathinfo($imagen["name"], PATHINFO_FILENAME));

        // Comprobar si el archivo es una imagen

        $esImagen = in_array(mime_content_type($imagen["tmp_name"]), array("image/jpg", "image/jpeg", "image/png", "image/gif"));
        if ($esImagen === false) {
            $_SESSION["error"]= "El archivo no es una imagen.";
            // Comprobar el tamaño del archivo
        } elseif ($imagen["size"] > 1000000) {
            $_SESSION["error"] = "Lo siento, el archivo es demasiado grande.";
            // Permitir ciertos formatos de archivo
        } elseif ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
            $_SESSION["error"] = "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        }

        // Intentar mover el archivo subido al directorio destino
        if ($_SESSION["error"] == "") {
            $nombreImagen =  $nombre . time() . '.' . $extension;
            $rutaArchivo = $directorioDestino . $nombreImagen;
            $resultado = @move_uploaded_file($imagen["tmp_name"], $rutaArchivo);
            if ($resultado === false) {
                $nombreImagen = NULL;
                $_SESSION["error"] = "Hubo un error al subir el archivo.";
            }
        }
        return $nombreImagen;
    }
}