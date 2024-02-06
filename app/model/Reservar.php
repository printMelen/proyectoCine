<?php
class Reservar{
    public static function insertar(){
        try {
            // Conexión a la base de datos
            $db = Conectar::conexion();
        
            // Iniciar transacción
            $db->beginTransaction();
            $sql="SELECT 
            id 
            FROM 
            personalc 
            WHERE correo LIKE :correo";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":correo", $_SESSION['correo']);
            $resultado->execute(); 
            $idUser= $resultado->fetchColumn();
            $idSesion=$_COOKIE['idSesion'];
            $butacas=explode(",",$_COOKIE['butacas']);
            $cantButacas=count($butacas);
            $fecha=date("Y-m-d");
            
            $sql="INSERT INTO 
            `compra_butacasc`(`sesion_id`, `usuario_id`, `cant_butacas`, `fecha_compra`) 
            VALUES (:sesionId,:usuarioId,:cantidad,:fecha);
            ";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":sesionId", $idSesion);
            $resultado->bindParam(":usuarioId", $idUser);
            $resultado->bindParam(":cantidad", $cantButacas);
            $resultado->bindParam(":fecha", $fecha);
            $resultado->execute();
            $idCompra = $db->lastInsertId();
            $sql="INSERT INTO 
            `butacas_reservadasc`(`idcompra`, `asiento`, `idsesion`) 
            VALUES (:idCompra,:asiento,:sesionId);
            ";
            $resultado = $db->prepare($sql);
            foreach ($butacas as $key => $butaca) {
                $resultado->bindParam(":idCompra", $idCompra);
                $resultado->bindParam(":asiento", $butaca);
                $resultado->bindParam(":sesionId", $idSesion);
                $resultado->execute();
            }
            $db->commit();
        
        
        
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error: ' . $e->getMessage();
            // Deshacer transacción en caso de error
            $db->rollBack();
        }
        
        // Cerrar la conexión
        $db = null;
    }
}