<?php
session_start();
$ctl = $_REQUEST['peticion'] ?? NULL;
$_SESSION["logeado"] = $_SESSION["logeado"] ?? NULL;
$_SESSION['nombre'] = $_SESSION['nombre'] ?? NULL;
// $_SESSION["errorLogin"] = $_SESSION["errorLogin"] ?? NULL;

$_SESSION["nif"]="";
$_SESSION["nombreApellidos"]="";
$_SESSION["correo"]="";
$_SESSION["errorLogin"]="";
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
        // echo $_COOKIE['correoUsuario'];
        ValidarController::validar();
        break;
    case 'movies':
        MoviesController::inicio();
        break;
    case 'logout':
        LogoutController::cerrar();
        break;
    case 'formularioPeli':
        FormularioPeliController::inicio();
        break;
    case 'formularioActor':
        FormularioActorController::inicio();
        break;
    default:
        DefaultController::inicio();
        break;
}
// if (session_status() == PHP_SESSION_ACTIVE) {
//     session_destroy();
// }
// session_destroy();
