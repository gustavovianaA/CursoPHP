<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h3><?= $dados['categoria']->titulo ?></h3>
            <p><?= $dados['categoria']->texto ?></p>
            
            <?= Helper::mensagem('categoria') ?>

            <article class="posts border-top pt-5">
                <?php foreach ($dados['posts'] as $post) : ?>
                    <?php if (!empty($post->postCapa)) : ?>
                        <div class="postImagem zoom">
                            <a href="<?= URL . '/post/' . $post->postUrl ?>">
                                <img class="img-fluid" src="<?= $post->postCapa ?>" alt="<?= $post->postTitulo ?>" title="<?= $post->postTitulo ?>">
                            </a>
                        </div>
                        <div class="postResumo">
                            <div class="postTexto">
                                <a href="<?= URL . '/post/' . $post->postUrl ?>" title="<?= $post->postTitulo ?>" data-toggle="tooltip">
                                    <h2><?= $post->postTitulo ?></h2>
                                </a>
                                <p><?= $post->postTexto ?></p>
                                <small>Escrito por: <b><?= $post->postAutor ?></b> em <i><?= Helper::dataBr($post->postDataCadastro) ?></i></small>
                            </div>
                        </div>
                    <?php else : ?>

                        <div class="postSemCapa">
                            <a href="<?= URL . '/post/' . $post->postUrl ?>" title="<?= $post->postTitulo ?>" data-toggle="tooltip">
                                <h2><?= $post->postTitulo ?></h2>
                            </a>
                            <p><?= $post->postTexto ?></p>
                            <small>Escrito por: <b><?= $post->postAutor ?></b> em <i><?= Helper::dataBr($post->postDataCadastro) ?></i></small>
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