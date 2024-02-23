<?php
class Sesiones{
    public static function comprobar()
    {
        $_SESSION["error"]="";
        $_SESSION["errorSesion"]="";
        $errors[]="";
        $devolver=false;
        $peliCorrecta=false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["pelicula"])) {
                $_SESSION['errorSesion'] = "La pelicula es obligatoria.";
            }

            foreach ($_SESSION['peliculasSesiones'] as $peli) {
                if ($peli['nombre_pelicula']==$_POST["pelicula"]) {
                    $peliCorrecta=true;
                    break;
                }
            }

            if (!$peliCorrecta) {
                $_SESSION['errorSesion'] = "La pelicula no existe.";
            }

            // Validar el campo Argumento
            if (empty($_POST["salas"])) {
                $_SESSION['errorSesion'] = "El campo sala es obligatorio.";
            }
            $fechaMinima = date('Y-m-d', strtotime('+1 days'));
            // Validar el campo Edad mínima
            if (empty($_POST["fecha"])) {
                $_SESSION['errorSesion'] = "El campo fecha es obligatorio.";
            } elseif ($_POST["fecha"] < $fechaMinima) {
                $_SESSION['errorSesion'] = "La fecha debe ser a partir de mañana.";
            }
        
            // Validar el campo Director
            if (empty($_POST["hora"])) {
                $_SESSION['errorSesion'] = "El campo hora es obligatorio.";
            }
        
            // Validar el campo Actor
            if (empty($_POST["precio"])) {
                $_SESSION['errorPeli'] = "El campo precio es obligatorio.";
            } elseif (!is_numeric($_POST["precio"]) || $_POST["precio"] < 0) {
                $_SESSION['errorPeli'] = "El precio debe ser un número positivo.";
            }
            
            
            if ($_SESSION['errorSesion']=="") {
                    $devolver=true;
                    Sesiones::crear(FormularioPeli::clean_input($_POST["pelicula"]),FormularioPeli::clean_input($_POST["salas"]),FormularioPeli::clean_input($_POST["fecha"]),FormularioPeli::clean_input($_POST["hora"]),FormularioPeli::clean_input($_POST["precio"]));
            }
            
            return $devolver;
        }
    }
    public static function crear($nombrePeli,$sala,$fecha,$hora,$precio)
    {
        $idSesion=null;
        try {
            // Conexión a la base de datos
            $db = Conectar::conexion();
            // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $peliEncodeada = urlencode($nombrePeli);
            $url = "http://localhost/dwes/proyectoCine/api/v1/cine/peliculas?buscar=".$peliEncodeada;
            $response = file_get_contents($url);
            $pelicula = json_decode($response, true);
            // echo "<pre>";
            // var_dump($pelicula);
            // echo "</pre>";
            // Iniciar transacción
            $db->beginTransaction();
            // $consultaSala = $db->prepare("SELECT id FROM salasc WHERE salasc.nombre LIKE = ?");
            // $consultaSala->execute([$sala]);
            // $idSala = $consultaSala->fetchColumn();
            
            $consultaHora = $db->prepare("SELECT id FROM horasc WHERE horasc.hora = ?");
            $consultaHora->execute([$hora]);
            $idHora = $consultaHora->fetchColumn();
            
            $sql = "
            SELECT
            id
            from 
            sesionesc
            where
            hora = :hora and sala_id = :idSala and fecha = :fecha;
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":fecha", $fecha);
            $resultado->bindParam(":hora", $idHora);
            $resultado->bindParam(":idSala", $sala);
            $resultado->execute();
            $idSesion = $resultado->fetchColumn();
            // echo "Hola";
            // echo $fecha;
            // echo $idSesion;
            if ($idSesion==null) {
                $idPeli=$pelicula[0]['id_pelicula'];
                $sql = "INSERT INTO 
                `sesionesc`( `fecha`, `hora`, `sala_id`, `precio`, `pelicula_id`) 
                VALUES 
                (:fecha,:hora,:idSala,:precio,:pelicula_id);
                ";
                $resultado = $db->prepare($sql);
                $resultado->bindParam(":fecha", $fecha);
                $resultado->bindParam(":hora", $idHora);
                $resultado->bindParam(":idSala", $sala);
                $resultado->bindParam(":precio", $precio);
                $resultado->bindParam(":pelicula_id", $idPeli);
                $resultado->execute();
                $idSesion = $db->lastInsertId();

            }else{
                $_SESSION['errorSesion'] = "Ya existe una sesión en esa sala a esa hora.";
            }

            // $consultaInsertarSesion = $db->prepare("INSERT INTO `sesionesc`(`fecha`, `hora`, `sala_id`, `precio`, `pelicula_id`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')");
            // $consultaInsertarSesion->execute([$fecha, $idHora, $sala, $precio, $idPeli]);
            
        
            // Obtener el ID de la sesión recién insertada
            $db->commit();
        
        
        
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error: ' . $e->getMessage();
            // Deshacer transacción en caso de error
            $db->rollBack();
        }
        
        // Cerrar la conexión
        $db = null;
        return $idSesion;
    }
}