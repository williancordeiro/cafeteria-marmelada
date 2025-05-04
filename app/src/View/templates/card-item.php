<div class="card-item">
    <div class="item-content">
        <img src="<?= $imagem ?>" alt="<?= $nome ?>" class="item-img">
        
        <p class="item-name"><?= $nome ?></p>

        <div class="item-details">
            <p class="item-price">Preço: <span>R$ <?= number_format($preco, 2, ',', '.') ?></span> </p>
            <p class="item-quantity">Quantidade: <span><?= $qtd ?></span></p>
        </div>
    </div>
</div>