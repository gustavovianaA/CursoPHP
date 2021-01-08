<div class="container my-5">

    <?= Helper::mensagem('usuario') ?>
    <div class="row">
        <div class="col-md-4">

            <div class="sideBar">
                <div class="zoom">
                    <?php if (!empty($dados['admin']->avatar)) : ?>
                        <img class="avatar" src="<?= $dados['avatar'] ?>">
                    <?php else: ?>
                        <img class="avatar" src="https://via.placeholder.com/150">
                    <?php endif ?>
                </div>
                <h4 class="text-center"><?= $dados['nome'] ?></h4>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fundoPrimario">
                    Dados Pessoais
                </div>
                <div class="card-body">
                    <form name="atualizar" method="POST" action="<?= URL ?>/usuario/perfil/<?= $dados['id'] ?>">
                        <div class="form-group">
                            <label for="avatar">Avatar:</label>
                            <input type="text" name="avatar" id="avatar" value="<?= $dados['avatar'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                            <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $dados['nome_erro'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                            <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $dados['email_erro'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha" class="form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $dados['senha_erro'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="biografia">Biografia:</label>
                            <textarea name="biografia" id="biografia" class="form-control" rows="3"><?= $dados['biografia'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook:</label>
                            <input type="text" name="facebook" id="facebook" value="<?= $dados['facebook'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="youtube">YouTube:</label>
                            <input type="text" name="youtube" id="youtube" value="<?= $dados['youtube'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram:</label>
                            <input type="text" name="instagram" id="instagram" value="<?= $dados['instagram'] ?>" class="form-control">
                        </div>

                        <input type="submit" value="Atualizar" data-toggle="tooltip" title="Atualizar Dados do Perfil" class="btn fundoSecundario btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>