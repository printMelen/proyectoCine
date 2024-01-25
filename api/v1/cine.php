<?php
require_once '../../autoload.php';
Cors::handleCors();

//header('Content-Type: application/JSON');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET': //mostrar           
        CMostrar::gestion();
        break;
    case 'POST': //insertar   
        CInsertar::gestion();
        break;
    case 'PUT': //actualizar
        CActualizar::gestion();
        break;
    case 'DELETE': //borrar
        CBorrar::gestion();
        break;
    default:  //METODO NO SOPORTADO       
        header("HTTP/1.0 400 Bad Request");
        break;
}