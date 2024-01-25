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
            generoc.nombre AS nombre_genero, 
            personalc.nombre AS nombre_personal, 
            personalc.tipo AS tipo_personal
            FROM 
            peliculasc 
            LEFT JOIN 
            generoc ON peliculasc.genero_id = generoc.id 
            LEFT JOIN 
            peliculas_personalc ON peliculasc.id = peliculas_personalc.pelicula_id 
            LEFT JOIN 
            personalc ON peliculas_personalc.personal_id = personalc.id
            where peliculasc.id=:id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":id", $id);
            $resultado->execute(); 
            $devolver=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($devolver as &$pelicula) {
                $pelicula['caratula'] = CMostrar::getRuta() . $pelicula['caratula'];
                // $pelicula['elenco'];
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
    public static function obtenerElenco($i){
        $devolver = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT  
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
            personalc ON peliculas_personalc.personal_id = personalc.id
            where peliculasc.id=:id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":id", $id);
            $resultado->execute(); 
            $devolver=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($devolver as &$pelicula) {
                $pelicula['caratula'] = CMostrar::getRuta() . $pelicula['caratula'];
                // $pelicula['elenco'];
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
    public static function getPeliculas(){
        $devolver = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                peliculasc.id AS id_pelicula, 
                peliculasc.nombre AS nombre_pelicula, 
                generoc.nombre AS genero, 
                peliculasc.cartel AS caratula
                FROM 
                peliculasc 
                LEFT JOIN 
                generoc ON peliculasc.genero_id = generoc.id 
                GROUP BY 
                peliculasc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            $devolver=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($devolver as &$pelicula) {
                $pelicula['caratula'] = CMostrar::getRuta() . $pelicula['caratula'];
                // $pelicula['elenco'];
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