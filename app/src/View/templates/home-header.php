<header>
    <nav class="navbar">
        <div>
            <a class="icon" href="<?= URL_RAIZ . 'home' ?>">☕</a>
        </div>
        <div>
            <a class="site-name" href="<?= URL_RAIZ ?>"><?= SITE_NAME ?></a>
        </div>
        <div class="menu-container">
            <button class="menu-toggle" id="mobileMenuBtn">&#9776;</button>
            <ol class="menu-mobile" id="mobileDropdown">
                <li><a href="<?= URL_RAIZ . 'home' ?>">Cardapio</a></li>
                <li><a href="<?= URL_RAIZ . 'products' ?>">Produtos</a></li>
                <li><a href="<?= URL_RAIZ . 'profile' ?>">Perfil</a></li>
            </ol>
            
            <ol class="menu-desktop">
                <li><a href="<?= URL_RAIZ . 'home' ?>">Cardapio</a></li>
                <li><a href="<?= URL_RAIZ . 'products' ?>">Produtos</a></li>
                <li><a href="<?= URL_RAIZ . 'profile' ?>">Perfil</a></li>
            </ol>
        </div>
    </nav>
</header>