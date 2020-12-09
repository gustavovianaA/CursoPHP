<?php
$link = "https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg";
$link2 = "https://www.infomoney.com.br/wp-content/uploads/2019/06/bandeira-do-brasil-pib.jpg";
$content = file_get_contents($link);
$content2 = file_get_contents($link2);
var_dump($content,$content2);
$parse = parse_url($link2);
var_dump($parse);
$basename = basename($parse["path"]); //nome do arquivo
$file=fopen($basename,"w+"); //cria o arquivo com o nome de origem
fwrite($file,$content2); //escreve o binário no arquivo
fclose($file);
?>
<img src="<?=$basename?>">