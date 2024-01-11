<?php
class FormularioPeli
{
    public static function comprobar()
    {
        $_SESSION["error"]="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $errors[] = "El campo Nombre es obligatorio.";
            }
        
            // Validar el campo Argumento
            if (empty($_POST["argumento"])) {
                $errors[] = "El campo Argumento es obligatorio.";
            }
        
            // Validar el campo Edad mínima
            if (empty($_POST["edadMinima"])) {
                $errors[] = "El campo Edad mínima es obligatorio.";
            } elseif (!is_numeric($_POST["edadMinima"]) || $_POST["edadMinima"] < 0) {
                $errors[] = "La Edad mínima debe ser un número positivo.";
            }
        
            // Validar el campo Género
            if (empty($_POST["genero"])) {
                $errors[] = "El campo Género es obligatorio.";
            }
        
            // Validar el campo Director
            if (empty($_POST["director"])) {
                $errors[] = "El campo Director es obligatorio.";
            }
        
            // Validar el campo Actor
            if (empty($_POST["actor"])) {
                $errors[] = "El campo Actor/Actriz es obligatorio.";
            }
            if (empty($errors)) {
                FormularioPeli::insertarPeli(FormularioPeli::clean_input($_POST["name"]),FormularioPeli::clean_input($_POST["argumento"]),FormularioPeli::clean_input($_POST["edadMinima"]),FormularioPeli::clean_input($_POST["director"]))
            } else {
                // Mostrar los errores al usuario
                foreach ($errors as $error) {
                    echo "<p>{$error}</p>";
                }
            }
        
        }
    }
    public static function insertarPeli($nombre, $argumento, $cartel, $clasificacion, $generoId)
    {
        try {
            $db = Conectar::conexion();
            $sql = "INSERT INTO `peliculasc`(`nombre`, `argumento`, `cartel`, `clasificacion_edad`, `genero_id`) VALUES (?,?,?,?,?)";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(1, $nombre, PDO::PARAM_STR);
            $resultado->bindParam(2, $argumento, PDO::PARAM_STR);
            $resultado->bindParam(3, $cartel, PDO::PARAM_STR);
            $resultado->bindParam(4, $clasificacion, PDO::PARAM_STR);
            $resultado->bindParam(5, $generoId, PDO::PARAM_INT);
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
            $nombreImagen = FormularioPeli::subirImagen($imagen);
        } else {
            $nombreImagen = "caratula.png";
        }
        return $nombreImagen;
    }

    public static function  clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function subirImagen($imagen): ?string
    {
        $nombreImagen = NULL;
        $directorioDestino = "app/view/img/caratulas/";
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