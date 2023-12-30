<?php
class ViewController
{
    public static function cargarVista($vistaNombre, $datos = [])
    {

        // Construye la ruta al archivo de la vista
        $vistaFichero = "app/view/templates" . $vistaNombre . ".php";

        // Comprueba si el archivo de la vista existe
        if (file_exists($vistaFichero)) {
            // Incluye el archivo de la vista
            include $vistaFichero;
        } else {
            // Maneja el error como prefieras
            echo "Error: la vista '$vistaNombre' no existe.";
        }
    }
}
