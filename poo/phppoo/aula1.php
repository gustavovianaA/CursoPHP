<?php

class Pessoa{

	public $nome;//Atributo

	public function falar(){//Método
		return "O meu nome é " . $this->nome;
	}

}

$gustavo = new Pessoa();
$gustavo->nome = "Gustavo Viana";
echo $gustavo->falar();


?>