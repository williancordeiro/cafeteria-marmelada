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
    
    <main>
        <div class="item-table-container">
            <h3>Produtos disponiveis:</h3>
            <div class="add-btn-wrapper">
                <a href="<?= URL_RAIZ . 'products/register' ?>" class="add-btn">Adicionar +</a>
            </div>
            <div class="table-scroll">
                <table class="item-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <?php
                                $id = $item['id'];
                                $nome = $item['nome'];
                                $preco = $item['preco'];
                                $qtd = $item['qtd'];
                                include VIEW_DIR . 'templates/row-item.php';
                            ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include VIEW_DIR . 'templates/footer.php';?>
</body>
</html>