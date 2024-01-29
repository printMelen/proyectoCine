<?php
class MoviePreviewController
{
    public static function inicio()
    {
        if (isset($_GET['id'])) {
            $_SESSION['fechas']=Fecha::formatearFecha(Fecha::sacarFecha());
            echo "<pre>";
            var_dump($_SESSION['fechas']);
            echo "</pre>";
            ViewController::cargarVista("peliGrande");
        }
    }
}