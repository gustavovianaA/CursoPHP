<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <?php include '' . APP . '/Views/admin/sideBar.php' ?>
        </div>
        <div class="col-lg-9">
            <?= Helper::mensagem('categoria') ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="<?= URL ?>/admin" data-toggle="tooltip" title="Postagens">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header fundoPrimario text-white">
                    Lista de Categorias
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
                            <?php foreach ($dados['categorias'] as $categoria) : ?>
                                <tr>

                                    <td class="align-middle">
                                        <h6><?= $categoria->titulo ?></h6>
                                    </td>
                                    <td class="text-center align-middle">
                                        <ul class="list-inline">
                                        <li class="list-inline-item">
                                                <a class="font-weight-bold" href="<?= URL . '/categoria/' . $categoria->id ?>" data-toggle="tooltip" title="Ver Categoria <?= $categoria->titulo ?>">
                                                    <i class="btn btn-outline-success border-0 fas fa-eye"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="font-weight-bold text-primary" href="<?= URL . '/admin/editar/categoria/' . $categoria->id ?>" data-toggle="tooltip" title="Editar <?= $categoria->titulo ?>">
                                                    <i class="btn btn-outline-primary border-0 fas fa-pen mr-2"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="<?= URL . '/admin/deletar/categoria/' . $categoria->id ?>" method="post">
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