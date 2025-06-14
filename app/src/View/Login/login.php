<?php
require_once 'config/geral.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
                <?php
                    if (isset($_SESSION['error'])) {
                        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']);
                    }
                ?>
                <h1>☕</h1>
                <h3>Entrar</h3>
            </div>
            <?php include VIEW_DIR . 'templates/login-form.php';?>
            <div class="form-text">
                <p>Ainda não tem Cadastro? <a class="link" href="<?= URL_RAIZ . 'register' ?>">Registrar-se</a></p>
            </div>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
    <script src="<?= URL_JS . 'index.js' ?>"></script>
</body>
</html>