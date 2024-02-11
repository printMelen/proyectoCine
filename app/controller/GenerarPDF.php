<?php
include 'vendor\autoload.php';
use Dompdf\Dompdf;

class GenerarPDF
{
    public static function generarPDF($fichero,$nombreRandom)
    {
        //Creamos un objeto de la clase DOMPDF y le indicamos que vamos a utilizar direcciones URL
        $dompdf = new Dompdf(array('enable_remote' => true, 'isHtml5ParserEnabled' => true));

        //Hemos generado el archivo pdf mediante una vista HTML que vamos a cargar en el objeto dompdf
        //ob_start() inicia el almacenamiento en búfer de la salida
        ob_start();
        include 'app/view/templates/tablaQr.php';
        
        //ob_get_clean() obtiene el contenido del búfer actual y elimina el búfer de salida actual
        $html = ob_get_clean();
        
        
        $dompdf->loadHtml($html);
        $dompdf->render();
        //Guardamos el pdf en la variable $datos
        $datos = $dompdf->output();
        // echo $datos;
        // echo URLPDF;
        //guarda el archivo pdf en la ruta indicada en el servidor, se debe indicar el path completo
        file_put_contents($nombreRandom, $datos);
        ControllerCorreo::enviarCorreo($_SESSION['correo'],"PlayOn información de compra","Le adjunto la factura de PlayOn:",true,$nombreRandom);
        //Indicamos que se va a generar un archivo pdf
        // header("Content-type:application/pdf");

        //Indicamos que el pdf generado se muestre en el navegador       
        // header('Content-disposition: inline; filename="' . $fichero . '"');

        //Indicamos que el pdf generado se guarde en un archivo
        // echo <<< EOT
        
        // EOT;
        // header('Content-Disposition:attachment; filename="' . $fichero . '"');
        
        //Muy importante, si no hacemos echo no se mostrará el pdf generado
        // echo $datos;
        exit;
    }
}
