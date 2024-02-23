<?php
class Reservar{
    public static function insertar(){
        $insertado=true;
        try {
            $correo=null;
            if ($_SESSION['correo']==null) {
                $correo=$_COOKIE['correoUsuario'];
            }else{
                $correo=$_SESSION['correo'];
            }
            // Conexión a la base de datos
            $db = Conectar::conexion();
        
            // Iniciar transacción
            $db->beginTransaction();
            $sql="SELECT 
            id,NIF
            FROM 
            usuariosc 
            WHERE correo LIKE :correo";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(":correo", $correo);
            $resultado->execute(); 
            // $idUser= $resultado->fetchColumn(0);
            // $nif= $resultado->fetchColumn(1);
            // $_SESSION['nif']=$nif;
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
            $idUser = $usuario['id'];
            $nif = $usuario['NIF'];
            $_SESSION['nif'] = $nif;
            $_SESSION['correo'] = $correo;
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
            $insertado=false;
            echo 'Error: ' . $e->getMessage();
            // Deshacer transacción en caso de error
            $db->rollBack();
        }
        
        // Cerrar la conexión
        $db = null;
        return $insertado;
    }
}