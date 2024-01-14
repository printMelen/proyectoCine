<?php
class FormularioPeli
{
    public static function comprobar()
    {
        $_SESSION["error"]="";
        $_SESSION["errorPeli"]="";
        $errors[]="";
        $devolver=false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (empty($_POST["name"])) {
                $_SESSION['errorPeli'] = "El campo Nombre es obligatorio.";
            }else{
                foreach (FormularioPeli::devolverPelis() as $nombrePelis) {
                    if($nombrePelis['nombre']==FormularioPeli::clean_input($_POST["name"])){
                        $_SESSION['errorPeli'] = "Ya hay una película con ese nombre";
                        break;
                    }
                }
            }
        
            // Validar el campo Argumento
            if (empty($_POST["argumento"])) {
                $_SESSION['errorPeli'] = "El campo Argumento es obligatorio.";
            }
        
            // Validar el campo Edad mínima
            if (empty($_POST["edadMinima"])) {
                $_SESSION['errorPeli'] = "El campo Edad mínima es obligatorio.";
            } elseif (!is_numeric($_POST["edadMinima"]) || $_POST["edadMinima"] < 0) {
                $_SESSION['errorPeli'] = "La Edad mínima debe ser un número positivo.";
            }
        
            // Validar el campo Género
            if (!isset($_POST['genero']) || empty($_POST['genero'])) {
                $_SESSION['errorPeli'] = "El campo Género es obligatorio.";
            }
        
            // Validar el campo Director
            if (empty($_POST["director"])) {
                $_SESSION['errorPeli'] = "El campo Director es obligatorio.";
            }
        
            // Validar el campo Actor
            if (empty($_POST["actor"])) {
                $_SESSION['errorPeli'] = "El campo Actor/Actriz es obligatorio.";
            }
            if ($_FILES["caratula"]['size']==0) {
                $_SESSION['errorPeli'] = "El campo imagen es obligatorio";
            }
            
            
            if ($_SESSION['errorPeli']=="") {
                // if (FormularioPeli::procesarImagen($_FILES["caratula"])!=null) {
                    $imagen=FormularioPeli::procesarImagen($_FILES["caratula"]);
                    $devolver=true;
                    FormularioPeli::crear(FormularioPeli::clean_input($_POST["name"]),FormularioPeli::clean_input($_POST["argumento"]),$imagen,FormularioPeli::clean_input($_POST["edadMinima"]),$_POST['genero'],FormularioPeli::clean_input($_POST["actor"]),FormularioPeli::clean_input($_POST["director"]));
                // }
            }
            
            return $devolver;
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
    public static function crear($nombre, $argumento, $cartel, $clasificacion, $generoId,$actor,$director){
        try {
            // Conexión a la base de datos
            $db = Conectar::conexion();
            // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Parámetros del formulario (sustituir con los valores reales)
            $nombrePelicula = $nombre;
            $arg = $argumento;
            $img = $cartel;
            $edad = $clasificacion; // Edad mínima para ver la película
            $genero = $generoId;
            $nombreDirector = $director;
            $nombreActor = $actor;
        
            // Iniciar transacción
            $db->beginTransaction();
            $consultaDirector = $db->prepare("SELECT id FROM personalc WHERE nombre = ? AND tipo = 'Director'");
            $consultaDirector->execute([$nombreDirector]);
            $idDirector = $consultaDirector->fetchColumn();
            
            // Verificar si el actor existe
            $consultaActor = $db->prepare("SELECT id FROM personalc WHERE nombre = ?");
            $consultaActor->execute([$nombreActor]);
            $idActor = $consultaActor->fetchColumn();
        
            // Si el director no existe, cancelar transacción
            if ($idDirector === false) {
                $_SESSION["errorPeli"]= 'El director no existe. Transacción cancelada.';
                $db->rollBack();
                return;
            }
            // Si el actor no existe, cancelar transacción
            if ($idActor === false) {
                
                    $_SESSION["errorPeli"]= 'El actor/actriz no existe. Transacción cancelada.';
                    $db->rollBack();
                    return;
                
            }
            
        
            // Insertar la película en la tabla peliculasc
            $consultaInsertarPelicula = $db->prepare("INSERT INTO peliculasc (nombre, argumento, cartel, clasificacion_edad, genero_id) VALUES (?, ?, ?, ?, ?)");
            $consultaInsertarPelicula->execute([$nombrePelicula, $arg, $img, $edad, $genero]);
            
        
            // Obtener el ID de la película recién insertada
            $idPelicula = $db->lastInsertId();
        
        
            $consultaInsertarRelaciones = $db->prepare("INSERT INTO peliculas_personalc (pelicula_id, personal_id) VALUES (?, ?), (?, ?)");
            $consultaInsertarRelaciones->execute([$idPelicula, $idDirector, $idPelicula, $idActor]);
            
            // Confirmar transacción
            $db->commit();
        
        
        
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error: ' . $e->getMessage();
            // Deshacer transacción en caso de error
            $db->rollBack();
        }
        
        // Cerrar la conexión
        $db = null;
    }
    public static function devolverPelis(){
        $peliculas="";
            try {
                $db = Conectar::conexion();
                $sql = "SELECT nombre FROM `peliculasc`";
                $resultado = $db->prepare($sql);
                $resultado->execute(); 
                $peliculas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
                $resultado = null; // obligado para cerrar la conexión
                $db = null; 
            } catch (PDOException $e) {
                echo "<br>Error: " . $e->getMessage();  
                echo "<br>Línea del error: " . $e->getLine();  
                echo "<br>Archivo del error: " . $e->getFile();
            }
            return $peliculas;
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
        $directorioDestino = "app/view/images/caratula/";
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