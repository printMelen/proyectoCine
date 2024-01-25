<?php

class Mostrar{
    public static function getPelicula($id){
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
            }
            // $devolver['caratula']=CMostrar::getRuta().$devolver['caratula'];
            // echo "<pre>";
            // var_dump($devolver);
            // echo "</pre>";
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
        
    }
    public static function getActores(){
        
    }
    public static function getSesiones($id){
        
    }
}