<?php

class Foto{
	private $id;
	private $titulo;
	private $descricao;
	private $imgPath;

	public function getId(){
	return $this->id;	
	}

	public function setId($value){
	$this->id = $value;	
	}
    
    public function getTitulo(){
	return $this->titulo;	
	}

	public function setTitulo($value){
	$this->titulo = $value;	
	}

	public function getDescricao(){
	return $this->descricao;	
	}

	public function setDescricao($value){
	$this->descricao = $value;	
	}


	public function getImgPath(){
	return $this->imgPath;	
	}

	public function setImgPath($value){
	$this->imgPath = $value;	
	}

    
	public function __construct($id,$titulo,$descricao,$imgpath){
    $this->setId($id);
    $this->setTitulo($titulo);
    $this->setDescricao($descricao);
    $this->setImgPath($imgpath);
	}

    public function gerar(){
    //echo $this->getId() . "<br>";
    echo "<h3 class='titulo'>" . $this->getTitulo() . "</h3><br>";
    echo $this->getDescricao() . "<br>";
    echo "<img src=" . $this->getImgPath() . "><br>";	
    } 
}
?>