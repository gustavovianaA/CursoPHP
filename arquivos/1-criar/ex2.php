<?php
$file = fopen("log2.txt","a+");
fwrite($file,date("y/m/D H:i:s") . "\n");
fclose($file);
echo "Arquivo criado com sucesso";
?>