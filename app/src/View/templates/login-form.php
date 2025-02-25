<form action="<?= URL_RAIZ . 'login' ?>" method="post" class="form">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="form-group btn">
        <button type="submit">Entrar</button>
    </div>
</form>