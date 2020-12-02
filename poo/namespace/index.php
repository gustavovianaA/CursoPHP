<?php
require_once("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();
$cad->setNome("Gustavo");
$cad->setEmail("g@gmail.com");
$cad->setSenha("123");

echo $cad;
$cad->registrarVenda();
?>