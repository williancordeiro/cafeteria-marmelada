<div class="card-item">
    <div class="item-content">
        <img src="<?= $imagem ?>" alt="<?= $nome ?>" class="item-img">
        
        <p class="item-name"><?= $nome ?></p>

        <div class="item-details">
            <span class="item-price">Preço: R$ <?= number_format($preco, 2, ',', '.') ?></span>
            <span class="item-quantity">Qtd: <?= $qtd ?></span>
        </div>
    </div>
</div>