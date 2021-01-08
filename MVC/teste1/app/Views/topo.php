<header>
    <div class="container">
        <nav class="navbar navbar-expand-sm">
            <a class="navbar-brand" href="<?= URL ?>">
                <div class="zoom">
                    <img class="img-fluid logo" src="<?= URL ?>/public/img/logotipo.png" alt="<?= APP_NOME ?>" title="<?= APP_NOME ?>">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>" data-toggle="tooltip" title="Página Inicial">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/pagina/blog" data-toggle="tooltip" title="blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/pagina/sobre" data-toggle="tooltip" title="Sobre nós">Sobre nós</a>
                    </li>
                </ul>

                <?php if (isset($_SESSION['usuario_id'])) : ?>
                    <span class="navbar-text">
                        <p class="text-white">Olá, <?= $_SESSION['usuario_nome'] ?>, Seja bem vindo(a)!</p>
                        <a class="btn btn-sm btn-danger" href="<?= URL ?>/usuario/sair" data-toggle="tooltip" title="Sair do Sistema">Sair</a>
                        <a class="btn btn-sm btn-primary" href="<?= URL ?>/usuario/perfil/<?= $_SESSION['usuario_id'] ?>" data-toggle="tooltip" title="Painel do Usuário">Perfil</a>
                        <?php if ($_SESSION['usuario_level'] == 3) : ?>
                            <a class="btn btn-sm btn-dark" href="<?= URL ?>/admin" data-toggle="tooltip" title="Painel do Administrador">Admin</a>
                        <?php endif; ?>
                    </span>
                <?php endif; ?>

            </div>
        </nav>
    </div>
</header>
<div class="clearfix"></div>