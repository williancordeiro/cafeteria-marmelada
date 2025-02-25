<form action="<?= URL_RAIZ . 'register' ?>" method="post" class="form">
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" autofocus>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="form-group btn">
        <button type="submit">Cadastrar-se</button>
    </div>
</form>