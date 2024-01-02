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

$ctl = $_REQUEST['peticion'] ?? NULL;

switch ($ctl) {
    case 'register':
        if ($_GET['enviado']=="si") {
            RegisterController::completado();
        }else{
            RegisterController::inicio();
        }
        break;
    case 'login':
        LoginController::inicio();
        break;
    case 'validar':
        ValidarController::validar();
        var_dump($_SESSION['email']);
        break;
    default:
        ViewController::cargarVista("indexUsuario");
        break;
}

