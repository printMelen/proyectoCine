<?php
class MostrarPdfController{
    public static function mostrarPdf()
    {
        $ruta_pdf = $_SESSION['pdf'];

        // Establecer encabezados para indicar que se va a mostrar un archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="archivo.pdf"');
        header('Content-Length: ' . filesize($ruta_pdf));

        // Mostrar el contenido del PDF
        readfile($ruta_pdf);

    }
}
?>