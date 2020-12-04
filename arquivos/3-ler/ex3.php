<?php
$filename = "txt.txt";
$file=fopen($filename,"a+");
fwrite($file, "Acessado.\n\r");
$file=fopen($filename,"r");
	while($row=fgets($file)){
		echo $row . "<br>";
	}
fclose($file);
?>