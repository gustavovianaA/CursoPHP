<?php
abstract class Animal{
	public function falar(){
    return "Som";
	}
	public function mover(){
    return "Anda";
	}
}

class Cachorro extends Animal{
	public function falar(){
	return "Late";	
	}
}

class Gato extends Animal{
	public function falar(){
		return "Mia";
	}
}

class Passaro extends Animal{
	public function falar(){
	return "Canta";	
	}

	public function mover(){
	return "Voa e " . parent::mover();}
}

$pluto = new Cachorro();
$cat = new Gato();
$ave = new Passaro();

echo $pluto->falar();
echo $pluto->mover();
echo "</br>";
echo $cat->falar();
echo $cat->mover();
echo "</br>";
echo $ave->falar();
echo $ave->mover();

?>