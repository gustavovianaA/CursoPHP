<?php
class endereco{
	private $logradouro;
	private $numero;
	private $cidade;

	public function __construct($a,$b,$c){
		$this->logradouro = $a;
		$this->numero = $b;
		$this->cidade = $c;
	}

	public function __destruct(){
		var_dump("DESTRUCT");
	}

	public function __toString(){
		return $this->logradouro . "," . $this->numero . ", " . $this->cidade;
	}
}

$meuEndereco = new Endereco("Rua Nome", "123" ,"São Paulo");

var_dump($meuEndereco);
echo "<br>" . $meuEndereco . "</br>";
//unset($meuEndereco);
?>