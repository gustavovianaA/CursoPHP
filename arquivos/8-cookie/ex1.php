<?php
$data = array(
	"empresa" => "Hcode"
);
setcookie("nome_do_cookie",json_encode($data),time() + 3600);
echo "cookie criado";
?>