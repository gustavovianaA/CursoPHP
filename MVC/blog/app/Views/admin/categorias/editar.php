<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <?php include ''.APP.'/Views/admin/sideBar.php' ?>
        </div>
        <div class="col-lg-9">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="<?= URL ?>/admin" data-toggle="tooltip" title="Postagens">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header fundoPrimario text-white">
                    Editar Categoria
                </div>
                <div class="card-body bg-light">
                    <form name="login" method="POST" action="<?= URL ?>/admin/editar/categoria/<?= $dados['id'] ?>" class="mt-4">
                        <div class="form-group">
                            <label for="titulo">Titulo: <sup class="text-danger">*</sup></label>
                            <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?= $dados['titulo_erro'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $dados['titulo_erro'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="texto">Texto: <sup class="text-danger">*</sup></label>
                            <textarea name="texto" id="texto" class="form-control  <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>" rows="5"><?= $dados['texto'] ?></textarea>
                            <div class="invalid-feedback">
                                <?= $dados['texto_erro'] ?>
                            </div>
                        </div>
                        <input type="submit" value="Editar Categoria" class="btn fundoPrimario btn-block" data-toggle="tooltip" title="Editar Categoria">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>