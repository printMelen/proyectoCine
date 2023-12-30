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

$ctl = $_REQUEST['ctl'] ?? 'default';

switch ($ctl) {
    case 'register':
        RegisterController::inicio();
        break;
    case 'producto':
        ProductoController::inicio();
        break;
    default:
        DefaultController::inicio();
        break;
}
