<?php
class Fecha{
    public static function sacarFecha() {
        $devolver = array();
        try {
            $db = Conectar::conexion();
            $sql = "SELECT 
                peliculasc.id,
                sesionesc.pelicula_id,
                sesionesc.fecha
                FROM 
                peliculasc 
                LEFT JOIN 
                sesionesc ON peliculasc.id = sesionesc.pelicula_id 
                GROUP BY 
                sesionesc.id;
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
    public static function formatearFecha($fechas){
        $final=array();
        foreach ($fechas as $key => &$fecha) {
            foreach ($final as $key => $fin) {
                if ($fin['fecha']==$fecha['fecha']) {
                    unset($final[$key]);
                }
    
            }
            if ($fecha['id']==$_GET['id']+1) {
                array_push($final,$fecha);
            }
        }
        return $final;
    }
}