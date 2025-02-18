<?php
    require_once 'config/geral.php';

    require_once 'config/routers.php';

    $request_uri = $_SERVER['REQUEST_URI'];
    $request_method = $_SERVER['REQUEST_METHOD'];

    if (isset($routers[$request_uri]) && isset($routers[$request_uri][$request_method])) {
        include $routers[$request_uri][$request_method];
        exit;
    }
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