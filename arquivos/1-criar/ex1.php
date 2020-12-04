<?php
$file = fopen("log.txt","w+");
fwrite($file,date("y/m/D H:i:s"));
fclose($file);
echo "Arquivo criado com sucesso";
?>