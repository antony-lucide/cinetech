<?php


spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);

    $file = __DIR__ . '/class/' . $class . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Utilisation des classes
use class\user;
use Controllers\UserController;

$user = new User();
$controller = new UserController();