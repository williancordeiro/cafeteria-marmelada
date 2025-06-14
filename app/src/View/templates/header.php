<header>
    <nav class="navbar">
        <div>
            <a class="icon" href="<?= URL_RAIZ ?>">☕</a>
        </div>
        <div>
            <a class="site-name" href="<?= URL_RAIZ ?>"><?= SITE_NAME ?></a>
        </div>
        <div class="menu-container">
            <button class="menu-toggle" id="mobileMenuBtn">&#9776;</button>
            <ol class="menu-mobile" id="mobileDropdown">
                <li><a href="<?= URL_RAIZ . 'register' ?>">Cadastrar-se</a></li>
                <li><a href="<?= URL_RAIZ . 'login' ?>">Entrar</a></li>
            </ol>

            <ol class="menu-desktop">
                <li><a href="<?= URL_RAIZ . 'register' ?>">Cadastrar-se</a></li>
                <li><a href="<?= URL_RAIZ . 'login' ?>">Entrar</a></li>
            </ol>
        </div>
    </nav>
</header>