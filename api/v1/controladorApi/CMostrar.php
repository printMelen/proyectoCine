<?php
class CMostrar
{
    public static function getRuta()
    {
        //revisad esta ruta, debe ser la correcta para vuestra aplicacición
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/imgs/';
    }
    public static function gestion()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            $mensaje = ["error" => "Endpoint no especificado"];
            $error = "400 Bad Request";
            self::enviarRespuesta(NULL, $error, $mensaje);
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            $recurso = $rutaPathSinBarra[1];
            $id = isset($rutaPathSinBarra[2]) ? $rutaPathSinBarra[2] : null;
            switch ($recurso) {
                case 'horas':
                    $datos=Mostrar::getHoras();
                    self::enviarRespuesta($datos);
                break;
                case 'salas':
                    $datos=Mostrar::getSalas();
                    self::enviarRespuesta($datos);
                break;
                case 'peliculas':
                    if ($id) {
                        $datos=Mostrar::getPelicula($id);
                    } else {
                        if (isset($_GET['buscar'])) {
                            if ($_GET['buscar']!=null) {
                                $datos=Mostrar::buscarPelicula($_GET['buscar']);
                            }else{
                                $datos=Mostrar::getPeliculas();                            
                            }
                        }else{
                            $datos=Mostrar::getPeliculas();                            
                        }
                    }
                    self::enviarRespuesta($datos);
                    break;
                case 'actores':
                    if ($id) {
                        $datos=Mostrar::getActor($id);
                    } else {
                        if (isset($_GET['buscar'])) {
                            if ($_GET['buscar']!=null) {
                                $datos=Mostrar::buscarActores($_GET['buscar']);
                            }else{
                                $datos=Mostrar::getActores();                            
                            }
                        }else{
                            $datos=Mostrar::getActores();                            
                        }
                    }
                    self::enviarRespuesta($datos);
                    break;
                case 'sesiones':
                    $dia = isset($_GET['dia']) ? $_GET['dia'] : null;
                    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
                    if ($dia) {
                        $datos=Mostrar::getSesionDia($dia);
                    }elseif ($nombre) {
                        $datos=Mostrar::getSesionesNom($nombre);
                    }else{
                        $datos=Mostrar::getSesiones();
                    }
                    self::enviarRespuesta($datos);
                    break;
                default:
                    $mensaje = ["error" => "Endpoint no especificado"];
                    $error = "400 Bad Request";
                    self::enviarRespuesta(NULL, $error, $mensaje);
                    break;
            }
        }
    }



    private static function enviarRespuesta($datosConsulta = NULL, $error = NULL, $mensaje = NULL)
    {
        if ($datosConsulta) {
            $codificado = json_encode(
                $datosConsulta,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
            header("HTTP/1.1 200 OK");
            echo $codificado;
        } else {
            header("HTTP/1.1 $error");
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
    
}
