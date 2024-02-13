<?php
session_start();
$ctl = $_REQUEST['peticion'] ?? NULL;
$_SESSION["logeado"] = $_SESSION["logeado"] ?? NULL;
$_SESSION['nombre'] = $_SESSION['nombre'] ?? NULL;
$_SESSION['correo'] = $_SESSION['correo'] ?? NULL;
// $_SESSION["errorLogin"] = $_SESSION["errorLogin"] ?? NULL;
$_SESSION["nombreApellidos"]="";
$_SESSION["errorLogin"]="";

// if (!isset($_SESSION['datosPelis'])) {
    DatosController::inicio();
// }else{
    // echo "<pre>";
    // var_dump($_SESSION['datosPelis']);
    // // for ($i=0; $i < count($_SESSION['datosPelis']); $i++) { 
    // // }
    // echo "</pre>";
// }
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
    case 'moviePreview':
        MoviePreviewController::inicio();
        break;
    case 'butacas':
        // var_dump($_POST);
        ButacasController::inicio();
        break;
    case 'reservaDeButacas':
        ReservarButacasController::inicio();
        break;
    case 'mostrarPdf':
        MostrarPdfController::mostrarPdf();
        break;
    case 'gestionarSesiones':
        SesionesController::inicio();
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
