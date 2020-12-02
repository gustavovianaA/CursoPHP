<?php
$printc = function($target , $name){
	echo "<hr>$name: " . $target;
};
define('SERVIDOR' , '127.0.0.1');
echo SERVIDOR;
define('BD' , array(
	'servidor' => '127.0.0.1',
	'usuário' => 'root',
	'senha' => '12345',
	'banco_de_dados' => 'my_db'
));
var_dump(BD);
echo "<hr>Banco de dados : " . BD['banco_de_dados'];
echo '<h2>Constantes pré definidads</h2>';
$printc(PHP_VERSION , 'PHP_VERSION');
$printc(DIRECTORY_SEPARATOR , 'DIRECTORY_SEPARATOR');
?>