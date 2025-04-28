<?php

$routers = [
    '/' => [
        'GET' => RAIZ . 'index.php',
    ],

    '/login' => [
        'GET' => CONTROLLER_DIR . 'LoginController.php?method=index',
        'POST' => CONTROLLER_DIR . 'LoginController.php?method=login',
    ],

    '/register' => [
        'GET' => CONTROLLER_DIR . 'RegisterController.php?method=index',
        'POST' => CONTROLLER_DIR . 'RegisterController.php?method=register',
    ],

    '/home' => [
        'GET' => CONTROLLER_DIR . 'HomeController.php?method=index',
    ],

    '/products' => [
        'GET' => CONTROLLER_DIR . 'ItemController.php?method=index',
        'POST' => CONTROLLER_DIR . 'ItemController.php?method=update',
    ],

    '/products/register' => [
        'GET' => CONTROLLER_DIR . 'ItemController.php?method=create',
        'POST' => CONTROLLER_DIR . 'ItemController.php?method=register',
    ],

    '/404' => [
        'GET' => CONTROLLER_DIR . 'StatusController.php?method=error404',
    ],

    '/503' => [
        'GET' => CONTROLLER_DIR . 'StatusController.php?method=error503',
    ],
];