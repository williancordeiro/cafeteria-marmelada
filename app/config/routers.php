<?php

$routers = [
    '/' => [
        'GET' => RAIZ . 'index.php',
    ],

    '/list' => [
        'GET' => CONTROLLER_DIR . 'ListController.php?method=list',
    ],

    '/login' => [
        'GET' => CONTROLLER_DIR . 'LoginController.php?method=index',
    ],

    '/register' => [
        'GET' => CONTROLLER_DIR . 'RegisterController.php?method=index',
        'POST' => CONTROLLER_DIR . 'RegisterController.php?method=register',
    ],

    '/404' => [
        'GET' => CONTROLLER_DIR . 'StatusController.php?method=error404',
    ],

    '/503' => [
        'GET' => CONTROLLER_DIR . 'StatusController.php?method=error503',
    ],
];