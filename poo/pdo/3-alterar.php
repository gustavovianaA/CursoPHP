<?php
$conn = new PDO("mysql:host=localhost;dbname=dbphp7" , "root" , "");
$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE id = :ID");
$login = "gustavo";
$password = "123";
$id = 3;
$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);
$stmt->bindParam(":ID" , $id);
$stmt->execute();
echo "Dados alterados.";
?>