<form action="<?= URL_RAIZ . '/products/register' ?>" method="post" class="form">
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" autofocus required>
    </div>
    <div class="form-group">
        <label for="price">Preço:</label>
        <input type="number" name="price" id="price" step="0.01" min="0" required>
    </div>
    <div class="form-group">
        <label for="qtd">Quantidade:</label>
        <input type="number" name="qtd" id="qtd" min="0" max="100" required>
    </div>
</form>