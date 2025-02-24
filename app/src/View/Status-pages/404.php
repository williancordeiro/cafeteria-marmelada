<?php
require_once 'config/geral.php';
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

    <main class="page-error">
        <div class="error_principal">
            <div class="error-code">
                <h1>404</h1>
            </div>
            <div class="error-message">
                <h3>Pagina não encontrada! <a href="<?= URL_RAIZ ?>">retornar</a></h3>
            </div>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
</body>
</html>