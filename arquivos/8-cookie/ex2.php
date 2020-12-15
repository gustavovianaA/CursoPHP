<?php
if(isset($_COOKIE["nome_do_cookie"])){
	$obj = json_decode($_COOKIE["nome_do_cookie"]);
	var_dump($obj);
	echo $obj->empresa;
}
?>