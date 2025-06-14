<form action="<?= URL_RAIZ . 'products/edit?id=' . $item->getId() ?>" method="post" class="form">
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($item->getName()) ?>" autofocus required>
    </div>
    <div class="form-group">
        <label for="price">Preço:</label>
        <input type="number" name="price" id="price" step="0.01" min="0" value="<?= $item->getPrice() ?>" required>
    </div>
    <div class="form-group">
        <label for="qtd">Quantidade:</label>
        <input type="number" name="qtd" id="qtd" min="0" max="100" value="<?= $item->getQtd() ?>" required>
    </div>
    <div class="form-group btn">
        <button type="submit">Salvar</button>
    </div>
</form>