<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <?= Helper::mensagem('post') ?>
            <article class="posts">
            <ul class="list-group list-group-flush">
                    <?php foreach ($dados['posts'] as $post) : ?>
                        <li class="list-group-item py-3">
                            <a href="<?= URL . '/post/' . $post->url ?>" title="<?= $post->titulo ?>" data-toggle="tooltip">
                                <h2 class="mt-0"><?= $post->titulo ?></h2>
                            </a>
                            <p><?= $post->texto ?></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </article>
        </div>
        <div class="col-lg-4">
        <?php include '' . APP . '/Views/sideBar.php' ?>
        </div>
    </div>
</div>