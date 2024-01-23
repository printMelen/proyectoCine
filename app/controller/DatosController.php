<?php
class DatosController
{
    public static function inicio()
    {
        $_SESSION['datosPelis']= Datos::sacarDatos();
        // $_SESSION['datosGenero']= Datos::sacarDatos();
        // $_SESSION['datosDirector']= Datos::sacarDatos();
    }
}