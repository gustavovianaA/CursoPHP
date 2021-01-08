<?php
session_start();
include './../app/phperror.php';
include './../app/configuracao.php';
include './../app/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= APP_NOME ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <link rel="stylesheet" href="<?= URL ?>/public/css/estilos.css">
        <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= URL ?>/public/img/favicon.ico" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include '../app/Views/topo.php';
        $rotas = new Rota();
        include '../app/Views/rodape.php';
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
        <script src="<?= URL ?>/public/js/summernote-pt-BR.js"></script> 
        <script src="<?= URL ?>/public/js/jquery.funcoes.js"></script> 
    </body>
</html>