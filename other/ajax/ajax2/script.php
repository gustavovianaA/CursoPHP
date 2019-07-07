<?php

if(isset($_POST)){
$id = $_POST['id'];

$detalhes = array(
array("id"=>"1","img"=>"1.jpg","descricao"=>"Imagem de uma praia."),
array("id"=>"2","img"=>"2.jpg","descricao"=>"Uma bela onda"),
array("id"=>"3","img"=>"3.jpg","descricao"=>"Estrada no meio da floresta"),
array("id"=>"4","img"=>"4.jpeg","descricao"=>"Cachoeira bonita")
);

switch($id){
case 1:
$target = $detalhes[0];
break;
case 2:
$target = $detalhes[1];
break;
case 3:
$target = $detalhes[2];
break;
case 4:
$target = $detalhes[3];
break;	
}


echo "Descrição: " . $target['descricao'];
echo "</br><img class='img_descricao' src=".$target['img']. ">"; 



}
?>