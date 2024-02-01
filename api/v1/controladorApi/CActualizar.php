<?php
class CActualizar
{
    public static function gestion()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            self::enviarRespuesta(null, null, "Falta el id del registro");
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            if (isset($rutaPathSinBarra[1]) && is_numeric($rutaPathSinBarra[1])) {  // Obtener un único registro
                self::actualizarPeli($rutaPathSinBarra[1]);
            } else {
                self::enviarRespuesta(null, null, "ID no válido");
            }
        }
    }
    public static function actualizarPeli($id)
    {
        $datosInsertar = json_decode(file_get_contents("php://input"), true);
        //Escribir código para actualizar el registro con id = $id
        if ($resultado = self::validarDatos($datosInsertar, $id)) {
            $resultado = Alimentos::actualizarAlimento($datosInsertar, $id);
        }

        if ($resultado) {
            self::enviarRespuesta($resultado, $id, "Registro actualizado correctamente");
        } else {
            self::enviarRespuesta(null, null, "Error al actualizar el registro");
        }
    }
    public static function validarDatos(&$datosInsertar, $id)
    {
        $camposValidos = ['nombre', 'argumento', 'clasificacion_edad', 'genero', 'cartel'];
        foreach ($datosInsertar as $campo => $valor) {
            if (!in_array($campo, $camposValidos)) {
                return false;
            }

            if ($campo == 'nombre' && !is_string($valor)) {
                return false;
            }

            if ($campo == 'imagen') {
                if (!is_string($valor)) {
                    return false;
                } else if (!empty($valor)) {
                    //recupero el nombre actual de la imagen, para no borrarla y sobreescribirla
                    $nombreActual = Alimentos::recuperarNombreImagen($id);
                    $nombreSinExtension = pathinfo($nombreActual, PATHINFO_FILENAME);
                    // var_dump($nombre);
                    // exit;
                    if (!Insertar::validarImagen($datosInsertar, $nombreSinExtension))
                        return false;
                    else {
                        $imgenantigua = Insertar::PATH . $nombreActual;
                        if (file_exists($imgenantigua)) {
                            unlink($imgenantigua);
                        }
                    }
                }
            }
        }

        return true;
    }
    private static function enviarRespuesta($datosConsulta, $id = null, $mensaje = null)
    {
        if ($id === null) {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array("error" => $mensaje));
        } else if ($datosConsulta) {
            header("HTTP/1.1 200 OK");
            echo json_encode(array("id" => $id, "message" => $mensaje));
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(array("error" => $mensaje));
        }
    }
}
