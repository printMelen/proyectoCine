<?php
require_once '../../autoload.php';
Cors::handleCors();

//header('Content-Type: application/JSON');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET': //mostrar           
        Mostrar::gestion();
        break;
    case 'POST': //insertar   
        Insertar::gestion();
        break;
    case 'PUT': //actualizar
        Actualizar::gestion();
        break;
    case 'DELETE': //borrar
        Borrar::gestion();
        break;
    default:  //METODO NO SOPORTADO       
        header("HTTP/1.0 400 Bad Request");
        break;
}