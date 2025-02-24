<!-- <?php
    require_once 'config/geral.php';
?> -->
   
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
