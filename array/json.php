<?php
$people = [['nome' => 'Gustavo' , 'idade' => 26 ],
	[ 'nome' => 'João' , 'idade' => 20 ]];
var_dump($people);
foreach($people as $person){
	$person['nome'] = utf8_decode($person['nome']);
} 
echo '<hr>' . json_encode($people);
$json = json_encode($people);
$arr = json_decode($json , true);
echo '<hr>';
var_dump($arr);
?>