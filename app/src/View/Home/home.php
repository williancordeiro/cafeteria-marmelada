<?php
require_once 'config/geral.php';

?>

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
    <main class="item-list">
        <div class="item-scroll">
            <div class="item">
                <?php foreach ($items as $item) : ?>
                    <?php 
                        $imagem = $item['imagem'];
                        $nome = $item['nome'];
                        $preco = $item['preco'];
                        $qtd = $item['qtd'];
                        include VIEW_DIR . 'templates/card-item.php';
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    
    <?php include VIEW_DIR . 'templates/footer.php';?>
    <script src="<?= URL_JS . 'index.js' ?>"></script>
</body>
</html>