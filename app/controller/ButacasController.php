<?php
class ButacasController
{
    public static function inicio()
    {
        if (isset($_POST["fechas"])) {
            ViewController::cargarVista("butacas");
        }
    }
}