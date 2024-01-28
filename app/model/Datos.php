<?php
class Datos{
    public static function sacarDatos() {
        $devolver = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                peliculasc.*, 
                generoc.nombre AS nombre_genero, 
                GROUP_CONCAT(DISTINCT personalc_director.nombre) AS nombre_director, 
                GROUP_CONCAT(DISTINCT personalc_actor.nombre) AS nombre_actor,
                GROUP_CONCAT(DISTINCT sesionesc.fecha) AS fechas
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
                LEFT JOIN 
                sesionesc ON peliculasc.id = sesionesc.id
                GROUP BY 
                peliculasc.id, generoc.nombre;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                // Convertir las fechas en un array
                $fila['fechas'] = $fila['fechas'] ? explode(',', $fila['fechas']) : array();
                $devolver[] = $fila;
            }
            $resultado->closeCursor();
            $resultado = null;
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        return $devolver;
    }
    // public static function sacarFechas(){
    //     $fechas=array();
    //     try {
    //         $db = Conectar::conexion();
    //         $sql = "SELECT 
    //         peliculasc.id, 
    //         sesionesc.fecha AS fecha, 
    //         horasc.hora AS hora 
    //         FROM 
    //         peliculasc 
    //         LEFT JOIN 
    //         sesionesc ON peliculasc.id = sesionesc.id 
    //         LEFT JOIN 
    //         horasc ON sesionesc.id = horasc.id 
    //         GROUP BY 
    //         peliculasc.id;
    //         ";
    //         $resultado = $db->prepare($sql);
    //         $resultado->execute(); 
    //         while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    //             $peliculaId = $fila['id'];
    //             unset($fila['id']); // Elimina la columna de id de película del resultado
    //             $fechas[$peliculaId][] = array(
    //                 'fecha' => $fila['fecha'],
    //                 'hora' => $fila['hora']
    //             );
    //         }
    //         // $fechas=$resultado->fetchAll(PDO::FETCH_ASSOC);
    //         $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
    //         $resultado = null; // obligado para cerrar la conexión
    //         $db = null; 
    //     } catch (PDOException $e) {
    //         echo "<br>Error: " . $e->getMessage();  
    //         echo "<br>Línea del error: " . $e->getLine();  
    //         echo "<br>Archivo del error: " . $e->getFile();
    //     }
    //     return $fechas;
    // }
}