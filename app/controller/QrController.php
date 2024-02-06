<?php
require_once 'qr/barcode.php';

class QrController
{
    public static function generarQr($datos = null)
    {
        // $datos = "sesion=4-butaca=17-usuario=pepito-pelicula=terror";

        //Construyendo ruta genérica para cualquier servidor
        $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
        $protocolo = $isSecure ? 'https://' : 'http://';

        $host = $_SERVER['HTTP_HOST']; //obtiene el nombre del servidor o la IP del servidor
        $port = $_SERVER['SERVER_PORT']; //obtiene el puerto del servidor       
        $rutaAplicacion = dirname($_SERVER['PHP_SELF']); //ruta de la aplicación-cada uno la vuestra según la ruta de vuestro proyecto
        
        //ruta al archivo donde está la librería barcode.php
        $archivo = "/qr/barcode.php?f=svg&s=qr-l&d=" . urlencode($datos) . "&sf=8&md=1";

        if (($isSecure && $port != 443) || (!$isSecure && $port != 80)) {
            $url = $protocolo . $host . ":" . $port . $rutaAplicacion . $archivo;
        } else {
            $url = $protocolo . $host . $rutaAplicacion . $archivo;
        }

        //Visualizar la url generada
        //echo $url;
        //http://localhost/xclase/venancio/cargaclases/qr/barcode.php?f=svg&s=qr-l&d=sesion%3D4-butaca%3D17-usuario%3Dpepito-pelicula%3Dterror&sf=8&md=1
        //exit;

        # Generar un nombre de archivo aleatorio que comienza con "QR"
        $nombreArchivo = "QR" . bin2hex(random_bytes(5)) . ".svg";
        # Definir la ruta de la carpeta donde se guardará el archivo
        $rutaCarpeta = Ruta::QR_PATH;

        # Crear la carpeta si no existe
        if (!file_exists($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0777, true);
        }
        $rutaArchivo = $rutaCarpeta . $nombreArchivo;

        # Obtener el contenido del archivo desde la URL
        $contenido = file_get_contents($url);

        # Guardar el contenido en el archivo en una carpeta del servidor
        file_put_contents($rutaArchivo, $contenido);


        // # Forzar la descarga del archivo,
        //  no puede usarse con la función header() si se ha enviado información 
        //  header('Content-Type: application/octet-stream');
        //  header("Content-Transfer-Encoding: Binary");
        //  header("Content-disposition: attachment; filename=$nombreArchivo");

        # Leer el archivo y sacarlo al navegador y permitir a usuario descargarlo
        readfile($rutaArchivo);

        # Otra opción: para mostrar el archivo SVG en el navegador
       
        echo '<img src="' . Ruta::QR_PATH . $nombreArchivo . '" />';

        # Proporcionar un enlace de descarga 
        echo '<a href="' . $rutaArchivo . '" download="' . $nombreArchivo . '">Descargar QR</a>';
     
    }
}
