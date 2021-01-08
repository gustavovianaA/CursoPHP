<div class=py-5>
    <?= Helper::mensagem('post') ?>
    <h2>Blog</h2>
    <div class="">
        <div class="">
            <article class="posts row">
                <?php
                $postFirst = true;
                foreach ($dados['posts'] as $post) : ?>
                    <?php if (!empty($post->capa)) : 
                        $styleClass = $postFirst ? "col-md-4" : "col-md-4";
                        ?>
                        <div class="<?=$styleClass?>" >
                        <div class="postImagem zoom">
                            <a href="<?= URL . '/post/' . $post->url ?>">
                                <img class="img-fluid" src="<?= $post->capa ?>" alt="<?= $post->titulo ?>" title="<?= $post->titulo ?>">
                            </a>
                        </div>
                        <div class="" style="padding: 0">
                            <div class="postTexto">
                                <a href="<?= URL . '/post/' . $post->url ?>" title="<?= $post->titulo ?>" data-toggle="tooltip">
                                    <h2><?= $post->titulo ?></h2>
                                </a>
                                <p><?php echo substr($post->texto , 0 , 200) . " ..." ?></p>
                                <small>Escrito por: <b><?= $post->nome ?></b> em <i><?= Helper::dataBr($post->postDataCadastro) ?></i></small>
                            </div>
                        </div>
                        </div>
                    <?php else : ?>

                        <div class="postSemCapa <?=$styleClass?>">
                            <a href="<?= URL . '/post/' . $post->url ?>" title="<?= $post->titulo ?>" data-toggle="tooltip">
                                <h2><?= $post->titulo ?></h2>
                            </a>
                            <p><?php echo substr($post->texto , 0 , 200) . " ..." ?></p>
                            <small>Escrito por: <b><?= $post->nome ?></b> em <i><?= Helper::dataBr($post->postDataCadastro) ?></i></small>
                        </div>

                    <?php endif ?>


                <?php $postFirst = false; endforeach ?>
            </article>
        </div>
     
    </div>
</div>