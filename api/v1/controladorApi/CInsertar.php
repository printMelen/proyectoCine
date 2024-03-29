<?php

/*  Respuesta al cliente:
        1. 200 : OK → La solicitud ha tenido éxito
                header("HTTP/1.0 200 OK");
        2. 201 : Created → La solicitud ha tenido éxito y se ha creado un nuevo recurso  
                header("HTTP/1.0 201 Created");
        3. 204 : No Content → La petición se ha completado con éxito, pero su respuesta no tiene ningún contenido  
                header("HTTP/1.0 204 No Content");
        4. 400 : Bad Request → La solicitud contiene sintaxis errónea 
                header("HTTP/1.0 400 Bad Request");
        5. 404 : Not Found → El servidor no pudo encontrar el contenido solicitado  
                header("HTTP/1.0 404 Not Found");       
        6. 500 : Internal Server Error → Se ha producido un error interno
                 header("HTTP/1.0 500 Internal Server Error");
   */
class CInsertar
{
    const PATH = './imgs/';
    public static function gestion()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        //El id es autoincremental, por lo que no es necesario pasarlo como parámetro
        //Lo debemos recoger de la base de datos
        //PDO nos permite obtener el último id insertado con el método lastInsertId()

        // var_dump($data);
        // exit;
        if (!isset($_SERVER['PATH_INFO'])) {
            $mensaje = ["error" => "Endpoint no especificado"];
            $error = "400 Bad Request";
            self::enviarRespuesta(NULL, $error, $mensaje);
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            $recurso = $rutaPathSinBarra[1];
            // $id = isset($rutaPathSinBarra[2]) ? $rutaPathSinBarra[2] : null;
            switch ($recurso) {
                case 'peliculas':
                    if (
                        isset($data['nombre']) && isset($data['argumento']) && isset($data['clasificacion_edad'])
                        && isset($data['genero']) && isset($data['cartel']) && isset($data['actores']) 
                    ) {
                        // Todos los campos requeridos están presentes, puedes continuar con la lógica de tu programa
                        if (self::validarDatos($data) && self::validarImagen($data)) {
                            $idPeli = self::registrarPeli($data);
                            // var_dump($idAlimento);
                            // var_dump($data);
                            // exit;
                            if ($idPeli) {
                                // Si la operación fue exitosa, envía una respuesta con el id del alimento
                                self::enviarRespuesta(true, $idPeli);
                            } else {
                                // Si hubo un error, envía un mensaje de error
                                self::enviarRespuesta(false, "Hubo un error al registrar la película");
                            }
                        } else {
                            $mensaje = "Valor de campo no válido en JSON recibido";
                            self::enviarRespuesta(false, $mensaje);
                            // El valor de alguno de los campos requeridos no es válido o bien la imagen no es válida,
                            // debes manejar este caso enviando un CÓDIGO 400 bad request al cliente
                            // y un mensaje de error en formato JSON
                            // Ejemplo: {"error": "valor de campo no válido en JSON recibido"}      
                        }
                    }else{
                            $mensaje = "Faltan campos requeridos en JSON recibido";
                            self::enviarRespuesta(false, $mensaje);
                            // Al menos uno de los campos requeridos no está presente,
                            // debes manejar este caso enviando un CÓDIGO 400 bad request al cliente
                            // y un mensaje de error en formato JSON
                            // Ejemplo: {"error": "Faltan campos requeridos en JSON recibido"}
                    }
                    break;
                case 'actores':
                    if(isset($data['nombre']) && isset($data['tipo']) && isset($data['imagen'])){
                        // Todos los campos requeridos están presentes, puedes continuar con la lógica de tu programa
                        if (self::validarImagen($data)) {
                            $idActor = self::registrarActor($data);
                            // var_dump($idAlimento);
                            // var_dump($data);
                            // exit;
                            if ($idActor) {
                                // Si la operación fue exitosa, envía una respuesta con el id del alimento
                                self::enviarRespuesta(true, $idActor);
                            } else {
                                // Si hubo un error, envía un mensaje de error
                                self::enviarRespuesta(false, "Hubo un error al registrar la película");
                            }
                        } else {
                            $mensaje = "Valor de campo no válido en JSON recibido";
                            self::enviarRespuesta(false, $mensaje);
                            // El valor de alguno de los campos requeridos no es válido o bien la imagen no es válida,
                            // debes manejar este caso enviando un CÓDIGO 400 bad request al cliente
                            // y un mensaje de error en formato JSON
                            // Ejemplo: {"error": "valor de campo no válido en JSON recibido"}      
                        }
                    }else{
                            $mensaje = "Valor de campo no válido en JSON recibido";
                            self::enviarRespuesta(false, $mensaje);
                            // El valor de alguno de los campos requeridos no es válido o bien la imagen no es válida,
                            // debes manejar este caso enviando un CÓDIGO 400 bad request al cliente
                            // y un mensaje de error en formato JSON
                            // Ejemplo: {"error": "valor de campo no válido en JSON recibido"}  
                        }
                    break;
                default:
                    $mensaje = ["error" => "Endpoint no especificado"];
                    $error = "400 Bad Request";
                    self::enviarRespuesta(NULL, $error, $mensaje);
                    break;
                }
            }
    }
    private static function validarDatos($data)
    {
        $correcto = true;
        // Verificar si todos los campos necesarios están presentes y no son nulos
        if (
            (!isset($data['nombre']) || !isset($data['argumento']) || !isset($data['clasificacion_edad']) ||
            !isset($data['genero'])|| !isset($data['actores']))
        ) {
            $correcto = false;
        }

        // Verificar si los campos numéricos son realmente números
        // if (
        //     !is_numeric($data['clasificacion_edad'])
        // ) {
        //     $correcto = false;
        // }

        // Si todos los controles pasan, los datos son válidos
        return $correcto;
    }


    public static function validarImagen(&$data, $nombreActual = null)
    {
        $valor = true;
        if (!isset($data['cartel'])) {
            $imagen64 = $data['imagen'];
        }else{
            $imagen64 = $data['cartel'];
        }
        $nombre = isset($nombreActual) ? $nombreActual : $data['nombre'];

        // Ensure that the image data is not empty
        if (empty($imagen64)) {
            $valor = false;
        } else {
            // Decode the base64-encoded image data
            $quitarCabecera = explode(';', $imagen64);

            // Ensure that $quitarCabecera has at least two elements before accessing index 1
            if (isset($quitarCabecera[1])) {
                $extension = explode('/', $quitarCabecera[0])[1];

                // Check if the image extension is valid (optional, depending on your requirements)
                // Example: if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                //              $valor = false;
                //          }
                if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])) {
                    $valor = false;
                }
                // Ensure that the image directory exists and has the necessary permissions

                // Establezco la extensión del fichero
                // $extension = 'jpg'; // Example: if you're sure about the extension
                $longitud = mb_strlen($imagen64);

                if (round($longitud * (1E-6), 2) > 1) {
                    //echo "<br>error, la imagen es demasiado grande";
                    $valor = false;
                } else {
                    if (!isset($data['cartel'])) {
                        $data['imagen'] = self::guardarImagen($quitarCabecera[1], $nombre, $extension);
                    }else{
                        $data['cartel'] = self::guardarImagen($quitarCabecera[1], $nombre, $extension);
                    }
                }
                // Guardar la imagen en el directorio
                // $data['cartel'] = self::guardarImagen($quitarCabecera[1], $nombre, $extension);
            } else {
                // Handle case when index 1 is not set
                $valor = false;
            }
        }

        return $valor;
    }

    private static function guardarImagen($imagen64, $nombre, $extension)
    {
        $nombreDev=null;
        $nombre_sin_espacios = strtolower(str_replace(' ', '_', $nombre));
        $nuevo_fichero_ruta = self::PATH . $nombre_sin_espacios . time() . '.' . $extension;
        $nombre_fichero = $nombre_sin_espacios . time() . '.' . $extension;

        // Ensure that the directory has the necessary permissions for writing
        // Ensure that file_put_contents has necessary permissions to write the file
        if (file_put_contents($nuevo_fichero_ruta, base64_decode($imagen64)) !== false) {
            $nombreDev= $nombre_fichero;
        }
        return $nombreDev;
    }


    private static function registrarPeli($data)
    {
        $idPeli = null;
        $arrayActores = explode(",",$data['actores']);
        foreach ($arrayActores as $key => &$actor) {
            $actor=ucwords(strtolower($actor));
        }
        $peli=Mostrar::buscarPelicula($data['nombre']);
        $elenco=Mostrar::buscarActores($arrayActores);
        if (!$peli&&$elenco) {
            $idPeli = Insertar::insertarPeli($data,$elenco);
        }
        return $idPeli;
    }
    private static function registrarActor($data)
    {
        $idActor = null;
        $arrayNombres=array($data['nombre']);
        if (!Mostrar::buscarActores($arrayNombres)) {
            $idActor = Insertar::insertarActor($data);
        }
        return $idActor;
    }
    private static function enviarRespuesta($esExitoso, $mensaje)
    {
        //Debes enviar una respuesta al cliente    

        if ($esExitoso) {
            // Si la operación fue exitosa, envía un código de estado 201 y el id del alimento insertado
            header("HTTP/1.0 201 Created");
            echo json_encode(['id' => $mensaje]);
        } else {
            // Si hubo un error, envía un código de estado 400 y un mensaje de error
            header("HTTP/1.0 400 Bad Request");
            echo json_encode(['error' => $mensaje]);
        }

        //Debes enviar un código de estado 400 bad request si ha habido algún error
        //Ejemplo: {"error": "Faltan campos requeridos en JSON recibido"}
        //O un código de estado 201 created si la operación ha sido correcta
        //Si ha sido correcta, debes enviar además el id del alimento insertado en un objeto JSON
        //Ejemplo: {"id": 1}

    }
}
