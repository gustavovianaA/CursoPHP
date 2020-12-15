<?php
class Paginas extends Controller{
    public function index(){
        $dados = [
            'tituloPagina'=>'Página Inicial',
            'descricao'=>'curso de PHP 7 MVC'
        ];
        $this->view('paginas/home',$dados);
    }
    public function sobre(){
        $dados = [
            'tituloPagina'=>'Página Sobre nós',
            'descricao'=>'curso de PHP 7 MVC'
        ];
        $this->view('paginas/sobre',$dados);
    }
}