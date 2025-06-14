<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/geral.php';
require_once 'config/routers.php';
require_once CONTROLLER_DIR . 'Controller.php';

//$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_uri === '/' && isset($_SESSION['user_id'])) {
    header("Location: " . URL_RAIZ . 'home');
    exit();
}

$controller = new Controller();
if ($request_uri === '/' && $request_method === 'GET') {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= URL_CSS . 'reset.css' ?>">
        <link rel="stylesheet" href="<?= URL_CSS . 'style.css' ?>">
        <title><?= SITE_NAME ?></title>
    </head>
    <body>
        <?php include VIEW_DIR . 'templates/header.php';?>
        <?php include VIEW_DIR . 'Index/index.php';?>
        <?php include VIEW_DIR . 'templates/footer.php';?>
        <script src="<?= URL_JS . 'index.js' ?>"></script>
    </body>
    </html>
    <?php
} else {
    $controller->handleRequest($request_uri, $request_method);
}
