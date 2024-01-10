<?php
session_start();
$ctl = $_REQUEST['peticion'] ?? NULL;
if (!isset($_SESSION["logeado"])) {
    $_SESSION["logeado"] = null;
}
if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = null;
}
// $_SESSION["rol"]??null;
// $_GET['enviado']=NULL;
switch ($ctl) {
    case 'register':
        RegisterController::inicio();
        break;
    case 'login':
        LoginController::inicio();
        break;
    case 'validar':
        echo $_COOKIE['correoUsuario'];
        ValidarController::validar();
        break;
    case 'movies':
        MoviesController::inicio();
        break;
    case 'logout':
        LogoutController::cerrar();
        break;
    default:
        ViewController::cargarVista("indexUsuario");
        break;
}
// session_destroy();
