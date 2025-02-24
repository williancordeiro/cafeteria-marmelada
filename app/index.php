<?php
require_once 'config/geral.php';
require_once 'config/routers.php';
require_once CONTROLLER_DIR . 'Controller.php';

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

$controller = new Controller();
if ($request_uri === '/' && $request_method === 'GET') {
    // Carrega o index apenas se for a rota principal
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= URL_CSS . 'style.css' ?>">
        <title><?= SITE_NAME ?></title>
    </head>
    <body>
        <?php include VIEW_DIR . 'templates/header.php';?>
        <?php include VIEW_DIR . 'Index/index.php';?>
        <?php include VIEW_DIR . 'templates/footer.php';?>
    </body>
    </html>
    <?php
} else {
    $controller->handleRequest($request_uri, $request_method);
}
