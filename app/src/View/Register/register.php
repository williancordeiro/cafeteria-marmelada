<?php
require_once 'config/geral.php';
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

    <main class="container">
        <div class="form-container">
            <div class="form-text" >
                <h1>☕</h1>
                <h3>Cadastre-se</h3>
            </div>
            <?php include VIEW_DIR . 'templates/register-form.php';?>
            <div class="form-text">
                <p>Ja tem cadastro? Faça <a class="link" href="<?= URL_RAIZ . 'login' ?>">Login</a></p>
            </div>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
</body>
</html>