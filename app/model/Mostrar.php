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
            foreach ($devolver as $indi => $pelicula) {
                foreach (Mostrar::obtenerElenco() as $actor) {
                    if ($actor['id_peli']==$pelicula["id_pelicula"]) {
                        unset($actor['id_peli']);
                        $actor['imagen_personal'] = CMostrar::getRuta() . $actor['imagen_personal'];
                        $devolver[$indi]['elenco'][]=$actor;
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
    public static function getButacas(){
        $butacas = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                sesionesc.id AS id_sesion, 
                salasc.id AS id_sala, 
                salasc.num_butacas AS todas_butacas, 
                COUNT(butacas_reservadasc.asiento) AS asientos_ocupados
                FROM 
                butacas_reservadasc
                LEFT JOIN 
                sesionesc ON butacas_reservadasc.idsesion = sesionesc.id
                LEFT JOIN 
                salasc ON sesionesc.id = salasc.id
                GROUP BY
                salasc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            $butacas=$resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado = null;
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        return $butacas;
    }
    public static function getSesiones(){
        $sesiones = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                sesionesc.id AS id_sesion, 
                salasc.nombre AS nombre_sala, 
                peliculasc.nombre AS nombre_peli, 
                sesionesc.fecha AS dia_sesion, 
                horasc.hora AS hora_sesion 
                FROM 
                sesionesc
                LEFT JOIN 
                salasc ON sesionesc.id = salasc.id
                LEFT JOIN 
                horasc ON sesionesc.hora = horasc.id
                LEFT JOIN 
                peliculasc ON sesionesc.id = peliculasc.id
                GROUP BY 
                sesionesc.id;
            ";
            $resultado = $db->prepare($sql);
            $resultado->execute(); 
            $sesiones=$resultado->fetchAll(PDO::FETCH_ASSOC);
            $butacas=self::getButacas();
            foreach ($sesiones as &$sesion) {
                foreach ($butacas as $butaca) {
                    if ($sesion['id_sesion']==$butaca['id_sesion']) {
                        $sesion['asientos_libres']=$butaca["todas_butacas"]-$butaca["asientos_ocupados"];
                        $sesion['asientos_ocupados']=$butaca["asientos_ocupados"];
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
        return $sesiones;
    }
}