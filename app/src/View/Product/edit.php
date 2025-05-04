<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_CSS . 'reset.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'style.css' ?>">
    <title><?= SITE_NAME ?></title>
</head>
<body>
    <?php include VIEW_DIR . 'templates/home-header.php';?>
    
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
                <h3>Editar Item</h3>
            </div>
            <?php include VIEW_DIR . 'templates/item-form-edit.php';?>
            <div class="btn-return-wrapper">
                <a class="link" href="<?= URL_RAIZ . 'products' ?>" class="btn-return"><- Voltar</a>
            </div>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
</body>
</html>