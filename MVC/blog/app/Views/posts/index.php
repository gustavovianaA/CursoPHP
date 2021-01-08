<div class="container py-5">
    <?= Helper::mensagem('post') ?>
    <div class="row">
        <div class="col-lg-8">
            <article class="posts">
                <?php foreach ($dados['posts'] as $post) : ?>
                    <?php if (!empty($post->capa)) : ?>
                        <div class="postImagem zoom">
                            <a href="<?= URL . '/post/' . $post->url ?>">
                                <img class="img-fluid" src="<?= $post->capa ?>" alt="<?= $post->titulo ?>" title="<?= $post->titulo ?>">
                            </a>
                        </div>
                        <div class="postResumo">
                            <div class="postTexto">
                                <a href="<?= URL . '/post/' . $post->url ?>" title="<?= $post->titulo ?>" data-toggle="tooltip">
                                    <h2><?= $post->titulo ?></h2>
                                </a>
                                <p><?= $post->texto ?></p>
                                <small>Escrito por: <b><?= $post->nome ?></b> em <i><?= Helper::dataBr($post->postDataCadastro) ?></i></small>
                            </div>
                        </div>
                    <?php else : ?>

                        <div class="postSemCapa">
                            <a href="<?= URL . '/post/' . $post->url ?>" title="<?= $post->titulo ?>" data-toggle="tooltip">
                                <h2><?= $post->titulo ?></h2>
                            </a>
                            <p><?= $post->texto ?></p>
                            <small>Escrito por: <b><?= $post->nome ?></b> em <i><?= Helper::dataBr($post->postDataCadastro) ?></i></small>
                        </div>

                    <?php endif ?>


                <?php endforeach ?>
            </article>
        </div>
        <div class="col-lg-4">
        <?php include '' . APP . '/Views/sideBar.php' ?>
        </div>
    </div>
</div>