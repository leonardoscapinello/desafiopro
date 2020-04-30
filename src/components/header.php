<header>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <a href="<?= SITE_URL ?>"><h1>DesafioPro - ShakePrime</h1></a>
                </div>
                <div class="col-xl-10 col-lg-10 col-sm-6">
                    <nav>
                        <ul class="navigation">
                            <?php if ($session->isLogged()) { ?>
                                <li><a href="<?= SITE_URL ?>affiliates">Afiliados</a></li>
                                <li><a href="<?= SITE_URL ?>members">Aulas</a></li>
                                <li><a href="<?= SITE_URL ?>logout">Sair</a></li>
                            <?php } else { ?>
                                <li><a href="<?= SITE_URL ?>">Inicio</a></li>
                                <li><a href="<?= SITE_URL ?>regras/">Regras</a></li>
                                <li><a href="<?= SITE_URL ?>premios">Prêmios</a></li>
                                <li><a href="<?= SITE_URL ?>atendimento">Atendimento</a></li>
                                <li><a href="<?= SITE_URL ?>login">Área de Membros</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>