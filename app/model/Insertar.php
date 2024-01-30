<?php

class Insertar
{
    public static function buscarGenero($peli){
        // $minusculas=strtolower($peli['genero']);
        // $cadena_formateada = ucfirst($minusculas);
        $devolver = null;
        try {
            $db = Conectar::conexion();
            $sql = "SELECT id FROM `generoc`
            where generoc.nombre=:nombre;
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":nombre", $peli['genero']);
            $resultado->execute(); 
            $devolver=$resultado->fetch(PDO::FETCH_ASSOC);
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
    public static function insertarPeli($peli){
        $id=false;
        $genero=self::buscarGenero($peli);
        // var_dump($genero);
        try {
            $db = Conectar::conexion();
            $sql = "INSERT INTO `peliculasc`
            ( `nombre`, `argumento`, `cartel`, `clasificacion_edad`, `genero_id`) 
            VALUES 
            (:nombre,:argumento,:cartel,:clasificacion_edad,:genero_id);
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":nombre", $peli['nombre']);
            $resultado->bindParam(":argumento", $peli['argumento']);
            $resultado->bindParam(":cartel", $peli['cartel']);
            $resultado->bindParam(":clasificacion_edad", $peli['clasificacion_edad']);
            $resultado->bindParam(":genero_id", $genero['id']);
            $resultado->execute(); 
            $resultado->fetchAll(PDO::FETCH_ASSOC);
            if ($resultado) {
                $id=$db->lastInsertId();
            }
            $resultado->closeCursor();
            $resultado = null;
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        return $id;
    }
    public static function insertarActor($actor){
        $id=false;
        // var_dump($genero);
        try {
            $db = Conectar::conexion();
            $sql = "INSERT INTO 
            `personalc`(`nombre`, `tipo`, `imagen`) 
            VALUES 
            (:nombre,:tipo,:imagen);
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":nombre", $actor['nombre']);
            $resultado->bindParam(":tipo", $actor['tipo']);
            $resultado->bindParam(":imagen", $actor['imagen']);
            $resultado->execute(); 
            $resultado->fetchAll(PDO::FETCH_ASSOC);
            if ($resultado) {
                $id=$db->lastInsertId();
            }
            $resultado->closeCursor();
            $resultado = null;
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        return $id;
    }
}