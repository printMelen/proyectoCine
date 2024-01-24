<?php
class Datos{
    public static function sacarDatos(){
        $devolver="";
            try {
                $db = Conectar::conexion();
                $sql = "SELECT peliculasc.*, 
                generoc.nombre AS nombre_genero,
                GROUP_CONCAT(personalc.nombre) AS nombre_director FROM peliculasc 
                LEFT JOIN generoc ON peliculasc.genero_id = generoc.id
                LEFT JOIN peliculas_personalc ON peliculasc.id = peliculas_personalc.pelicula_id
                LEFT JOIN personalc ON peliculas_personalc.personal_id = personalc.id AND personalc.tipo = 'Director' GROUP BY peliculasc.id,generoc.nombre;
                ";
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