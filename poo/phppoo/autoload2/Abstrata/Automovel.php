<?php

interface Veiculo{
  public function acelerar($velocidade);
  public function frenar($velocidade);
  public function trocarMarcha($marcha);

}

abstract class Automovel implements Veiculo{
   public function acelerar($velocidade){
   	return "O veículo acerela até " . $velocidade . "km/h";
   }
   public function frenar($velocidade){
   	return "O veiculo frenou até" . $velocidade . "km/h";
   }
   public function trocarMarcha($marcha){
    return "O veícuo engatou a marcha" . $marcha; 
   }
}


?>