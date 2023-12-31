<?php
//require_once "autoload.php";

// spl_autoload_register(function ($clase) {
//     $paths = [
//         'app/controller/' . $clase . '.php',
//         'bd/' . $clase . '.php',
//         'app/model/' . $clase . '.php',
//     ];

//     foreach ($paths as $path) {
//         if (file_exists($path)) {
//             require_once $path;
//             break;
//         }
//     }
// });
session_start();
$ctl = $_REQUEST['peticion'] ?? NULL;
// $_GET['enviado']=NULL;
switch ($ctl) {
    case 'register':
        if ($_GET['enviado'] == "si") {
            RegisterController::completado();
        } else {
            RegisterController::inicio();
        }
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
