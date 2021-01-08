<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent border-bottom text-uppercase font-weight-bold">
            <li class="breadcrumb-item">
                <a href="<?= URL ?>" data-toggle="tooltip" title="Postagens">
                    Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?= URL ?>/categoria/<?= $dados['categoria']->url ?>" data-toggle="tooltip" title="Postagens">
                    <?= $dados['categoria']->titulo ?>
                </a>
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8">

            <div class="postTopo my-3">
                <div class="row">
                    <div class="col-md-6">
                        <small><i class="fas fa-user"></i> <b><?= $dados['autor']->nome ?></b> <i class="far fa-calendar-alt"></i> <?= date('d/m/Y', strtotime($dados['post']->criado_em)) ?> <i class="far fa-clock"></i> <?= date('h:s', strtotime($dados['post']->criado_em)) ?></small>
                    </div>
                    <div class="col-md-6">
                        <!-- Espaço para icones de compartilhamento -->
                    </div>
                </div>
            </div>

            <article class="posts">
                <?php if (!empty($dados['post']->capa)) : ?>
                    <div class="postImagem zoom">
                        <img class="img-fluid" src="<?= $dados['post']->capa ?>" alt="<?= $dados['post']->titulo ?>" title="<?= $dados['post']->titulo ?>">
                    </div>
                    <div class="postResumo">
                        <div class="postTexto">
                            <h2><?= $dados['post']->titulo ?></h2>
                            <p><?= $dados['post']->texto ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="postSemCapa">
                        <h2><?= $dados['post']->titulo ?></h2>
                        <p><?= $dados['post']->texto ?></p>
                    </div>
                <?php endif ?>
            </article>
        </div>
        <div class="col-lg-4">
            <?php include '' . APP . '/Views/sideBar.php' ?>
        </div>
    </div>
</div>