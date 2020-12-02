<?php
//spaceship operator
$spaceship  = function($a , $b){
    $c = $a <=> $b;
	switch($c){
		case 0: 
		return "$a = $b <br>";
		break;
		case -1:
		return "$a < $b <br>";
		break;
		case 1:
		return "$a > $b <br>";
		break;
	}
};
echo "<h1>Spaceship Operator <=> </h1>";
echo $spaceship(0,0);
echo $spaceship(0,1);
echo $spaceship(1,0);
require('../teste.php');
?>