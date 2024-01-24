<?php
class Datos{
    public static function sacarDatos(){
        $devolver="";
            try {
                $db = Conectar::conexion();
                $sql = "SELECT 
                peliculasc.*, 
                generoc.nombre AS nombre_genero, 
                GROUP_CONCAT(DISTINCT personalc_director.nombre) AS nombre_director, 
                GROUP_CONCAT(DISTINCT personalc_actor.nombre) AS nombre_actor
                FROM 
                peliculasc 
                LEFT JOIN 
                generoc ON peliculasc.genero_id = generoc.id 
                LEFT JOIN 
                peliculas_personalc ON peliculasc.id = peliculas_personalc.pelicula_id 
                LEFT JOIN 
                personalc AS personalc_director ON peliculas_personalc.personal_id = personalc_director.id 
                AND personalc_director.tipo = 'Director' 
                LEFT JOIN 
                peliculas_personalc AS pp_actor ON peliculasc.id = pp_actor.pelicula_id 
                LEFT JOIN 
                personalc AS personalc_actor ON pp_actor.personal_id = personalc_actor.id 
                AND personalc_actor.tipo != 'Director' 
                GROUP BY 
                peliculasc.id, generoc.nombre;
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