<?php
if(isset($_POST['id'])){
spl_autoload_register(function($classe){
$path = "class" . DIRECTORY_SEPARATOR . $classe . ".php";
if(file_exists($path) === true){
require_once($path);	
}
});
function chooseElement($id){
switch($id){
case 1:
$option = new Foto(1,"Praia","Uma bela Praia","img/1.jpg");
break;
case 2:
$option = new Foto(2,"Onda","Uma bela onda","img/2.jpg");
break;
case 3:
$option = new Foto(3,"Estrada","Estrada no meio da floresta","img/3.jpg");
break;
case 4:
$option = new Foto(1,"Cachoeira","Cachoeira em dia bonito","img/4.jpeg");
break;
default;
die();	
}
return $option;	
}


$id = $_POST['id'];
$foto = chooseElement($id);
$foto->gerar();



}
?>