<?php

class Mostrar{
    public static function getPelicula($id){
        $devolver = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
            peliculasc.id AS id_pelicula, 
            peliculasc.nombre AS nombre_pelicula, 
            peliculasc.cartel AS caratula,
            generoc.nombre AS nombre_genero 
            FROM 
            peliculasc 
            LEFT JOIN 
            generoc ON peliculasc.genero_id = generoc.id
            where peliculasc.id=:id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":id", $id);
            $resultado->execute(); 
            $devolver=$resultado->fetch(PDO::FETCH_ASSOC);
            $devolver['caratula'] = CMostrar::getRuta() . $devolver['caratula'];
            foreach (Mostrar::obtenerElenco() as $actor) {
                if ($actor['id_peli']==$id) {
                    unset($actor['id_peli']);
                    $actor['imagen_personal'] = CMostrar::getRuta() . $actor['imagen_personal'];
                    $devolver['elenco'][]=$actor;
                }
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
    public static function obtenerElenco(){
        $devolver = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT  
            peliculasc.id AS id_peli, 
            personalc.id AS id_personal, 
            personalc.nombre AS nombre_personal, 
            personalc.imagen AS imagen_personal, 
            personalc.tipo AS tipo_personal
            FROM 
            peliculasc 
            LEFT JOIN 
            generoc ON peliculasc.genero_id = generoc.id 
            LEFT JOIN 
            peliculas_personalc ON peliculasc.id = peliculas_personalc.pelicula_id 
            LEFT JOIN 
            personalc ON peliculas_personalc.personal_id = personalc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            $devolver=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
    public static function getPeliculas(){
        $devolver["id_pelicula"] = "";
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
            peliculasc.id AS id_pelicula, 
            peliculasc.nombre AS nombre_pelicula, 
            peliculasc.cartel AS caratula,
            generoc.nombre AS nombre_genero 
            FROM 
            peliculasc 
            LEFT JOIN 
            generoc ON peliculasc.genero_id = generoc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            $devolver=$resultado->fetchAll(PDO::FETCH_ASSOC);
            // foreach ($devolver as &$pelicula) {
            //     $pelicula['caratula'] = CMostrar::getRuta() . $pelicula['caratula'];
            // }
            // foreach (Mostrar::obtenerElenco() as $actor) {
            //     if ($actor['id_peli']==$devolver['id_pelicula']) {
            //         unset($actor['id_peli']);
            //         $actor['imagen_personal'] = CMostrar::getRuta() . $actor['imagen_personal'];
            //         $devolver['elenco'][]=$actor;
            //     }
            // }
            // Parte del bucle foreach corregida
            foreach (Mostrar::obtenerElenco() as $key => $actor) {
                echo "<pre>";
                // var_dump($actor);
                echo $actor['id_peli'];
                echo "</pre>";
                foreach ($devolver as $pelicula) {
                    if ($actor['id_peli'] == $pelicula["id_pelicula"]) {
                        // unset($actor['id_peli']);
                        $actor['imagen_personal'] = CMostrar::getRuta() . $actor['imagen_personal'];
                        $pelicula['elenco'][] = $actor;
                    }
                }
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
    public static function getActor($id){
        $elenco = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                personalc.id AS id_personal, 
                personalc.nombre AS nombre_personal, 
                personalc.imagen AS imagen_personal,
                personalc.tipo AS rol_personal 
                FROM 
                personalc where personalc.id = :id
                GROUP BY 
                personalc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":id", $id);
            $resultado->execute(); 
            $elenco=$resultado->fetch(PDO::FETCH_ASSOC);
            $elenco['imagen_personal']= CMostrar::getRuta().$elenco['imagen_personal'];
            $resultado->closeCursor();
            $resultado = null;
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        return $elenco;
    }
    public static function getActores(){
        $elenco = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                personalc.id AS id_personal, 
                personalc.nombre AS nombre_personal, 
                personalc.imagen AS imagen_personal,
                personalc.tipo AS rol_personal 
                FROM 
                personalc
                GROUP BY 
                personalc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            $elenco=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($elenco as &$actor) {
                $actor['imagen_personal'] = CMostrar::getRuta() . $actor['imagen_personal'];
            }
            $resultado->closeCursor();
            $resultado = null;
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        return $elenco;
    }
    public static function getSesiones($id){
    }
}