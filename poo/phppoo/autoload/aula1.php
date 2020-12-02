<?php
function __autoload($nomeClasse){
	require_once("$nomeClasse.php");
	echo $nomeClasse;

}
$carro = New DelRey();
$carro->acelerar(80);
//$carro2 = New Honda();

?>