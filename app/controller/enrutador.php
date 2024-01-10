<?php
session_start();
$ctl = $_REQUEST['peticion'] ?? NULL;
// $_GET['enviado']=NULL;
switch ($ctl) {
    case 'register':
        RegisterController::inicio();
        break;
    case 'login':
        if ($_GET['enviado'] == "si") {
            LoginController::comprobar();
        } else {
            LoginController::inicio();
        }
        break;
    case 'validar':
        echo $_COOKIE['correoUsuario'];
        ValidarController::validar();
        break;
    case 'movies':
        MoviesController::inicio();
        break;
    default:
        ViewController::cargarVista("indexUsuario");
        break;
}
