<?php
class Peliculas{
    public static function getPelicula(){
        $devolver="";
            try {
                $db = Conectar::conexion();
                $sql = "SELECT * FROM `peliculasc`";
                $resultado = $db->prepare($sql);
                $resultado->execute(); 
                $devolver=$resultado->fetchAll(PDO::FETCH_ASSOC);
                $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
                $resultado = null; // obligado para cerrar la conexión
                $db = null; 
            } catch (PDOException $e) {
                echo "<br>Error: " . $e->getMessage();  
                echo "<br>Línea del error: " . $e->getLine();  
                echo "<br>Archivo del error: " . $e->getFile();
            }
            return $devolver;
        }
}