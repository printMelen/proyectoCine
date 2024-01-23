<?php
spl_autoload_register(function ($clase) {
    $paths = [
        'database/' . $clase . '.php',
        'app/controller/' . $clase . '.php',
        'app/model/' . $clase . '.php',
        'app/view/templates/' . $clase . '.php',
        'cors/' . $clase . '.php',
        'controladorApi/' . $clase . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            break;
        }
    }
});
