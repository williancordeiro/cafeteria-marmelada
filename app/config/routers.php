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

    '/principal' => [
        'GET' => CONTROLLER_DIR . 'PrincipalController.php?method=index',
    ],

    '/404' => [
        'GET' => CONTROLLER_DIR . 'StatusController.php?method=error404',
    ],

    '/503' => [
        'GET' => CONTROLLER_DIR . 'StatusController.php?method=error503',
    ],
];