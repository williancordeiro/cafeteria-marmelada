<?php
require_once 'config/geral.php';

session_start();
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
        <?php
            if (isset($_SESSION['error'])) {
                echo "<script>alert('" . $_SESSION['error'] . "');</script>";
                unset($_SESSION['error']);
            }
        ?>
        <div class="form-container">
            <div class="form-text" >
                <h1>☕</h1>
                <h3>Cadastrar-se</h3>
            </div>
            <?php include VIEW_DIR . 'templates/register-form.php';?>
            <div class="form-text">
                <p>Já possui cadastro? <a class="link" href="<?= URL_RAIZ . 'login' ?>"> Entrar </a></p>
            </div>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
    <script src="<?= URL_JS . 'index.js' ?>"></script>
</body>
</html>