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
    <!-- <?php include_once VIEW_DIR . 'templates/header.php';?> -->
    
    <main class="item-list">
        <div class="item">
            <?php foreach ($items as $item) : ?>
                <?php
                    $imagem = $item['imagem'];
                    $nome = $item['content'];
                    include VIEW_DIR . 'templates/itens.php';
                ?>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
</body>
</html>