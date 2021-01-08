<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <?php include '' . APP . '/Views/admin/sideBar.php' ?>
        </div>
        <div class="col-lg-9">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="<?= URL ?>/admin" data-toggle="tooltip" title="Postagens">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Escrever</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header fundoPrimario text-white">
                    Escrever Post
                </div>
                <div class="card-body bg-light">
                    <form name="login" enctype="multipart/form-data" method="POST" action="<?= URL ?>/admin/cadastrar/post" class="mt-4">
                        <div class="form-group">
                            <label for="titulo">Titulo: <sup class="text-danger">*</sup></label>
                            <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?= $dados['titulo_erro'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $dados['titulo_erro'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summernote">Texto: <sup class="text-danger">*</sup></label>
                            <textarea name="texto" id="summernote" class="form-control  <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>" rows="5"><?= $dados['texto'] ?></textarea>
                            <div class="invalid-feedback">
                                <?= $dados['texto_erro'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select class="form-control <?= $dados['categoria_erro'] ? 'is-invalid' : '' ?>" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                
                                <?php foreach ($dados['categorias'] as $categoria) : ?>
                                    <option value="<?= $categoria->id ?>"><?= $categoria->titulo ?></option>
                                <?php endforeach ?>

                            </select>
                            <div class="invalid-feedback">
                                <?= $dados['categoria_erro'] ?>
                            </div>
                        </div>

                        <input type="submit" value="Cadastrar Post" class="btn fundoPrimario btn-block" data-toggle="tooltip" title="Cadastrar Post">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>