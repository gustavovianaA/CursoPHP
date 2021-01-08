<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <?php include '' . APP . '/Views/admin/sideBar.php' ?>
        </div>
        <div class="col-lg-9">
            <?= Helper::mensagem('post') ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="<?= URL ?>/admin" data-toggle="tooltip" title="Postagens">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header fundoPrimario text-white">
                    Lista de Posts
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width:60%">Título</th>
                                <th style="width:40%">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dados['posts'] as $post) : ?>
                                <tr>

                                    <td class="align-middle">
                                        <h6><?= $post->titulo ?></h6>
                                    </td>
                                    <td class="text-center align-middle">
                                        <ul class="list-inline">
                                        <li class="list-inline-item">
                                                <a class="font-weight-bold" href="<?= URL . '/post/' . $post->postId ?>" data-toggle="tooltip" title="Ver Post <?= $post->titulo ?>">
                                                    <i class="btn btn-outline-success border-0 fas fa-eye"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="font-weight-bold" href="<?= URL . '/admin/editar/post/' . $post->postId ?>" data-toggle="tooltip" title="Editar <?= $post->titulo ?>">
                                                    <i class="btn btn-outline-primary border-0 fas fa-pen"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="<?= URL . '/admin/deletar/post/' . $post->postId ?>" method="post">
                                                    <button class="btn btn-sm btn-outline-danger border-0"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>

                                    </td>

                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>