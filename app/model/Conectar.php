<?php
class Conectar
{
    public static function conexion()
    {
        try {
            $conexion = new PDO('mysql:host=' . Config::HOST . ';dbname=' . Config::DATABASE . ';port=' . Config::PORT . ';charset=' . Config::CHARSET, Config::USERNAME, Config::PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit("<h2><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h2>");
        }
        return $conexion;
    }
}
