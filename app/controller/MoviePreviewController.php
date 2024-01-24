<?php
class MoviePreviewController
{
    public static function inicio()
    {
        if (isset($_GET['id'])) {
            ViewController::cargarVista("peliGrande");
        }
    }
}