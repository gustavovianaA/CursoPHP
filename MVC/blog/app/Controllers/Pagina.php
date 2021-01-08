<?php

class Pagina extends Controller {

    public function __construct()
    {
        //chama os modelos responsáveis por fazer a comunicação com o banco de dados
        $this->postModel = $this->model('PostModel');
        $this->usuarioModel = $this->model('UsuarioModel');
        $this->categoriaModel = $this->model('CategoriaModel');
    }

    public function index(){
        $posts = $this->postModel->lerPosts();
        $admin = $this->usuarioModel->lerAdmin();
        $categorias = $this->categoriaModel->lerCategorias();

        //exibe uma mensagem caso não tenha nenhum post cadastrado
        if ($posts == null) :
            Helper::mensagem('post', 'Nenhum post cadastrado para exibir.', 'alert alert-info');
        endif;
        
        //define os dados dos posts
        $dados = [
            'posts' => $posts,
            'admin' => $admin,
            'categorias' => $categorias
        ];
        //define a view para exibir os posts
        $this->view('posts/index', $dados);
    }

    public function sobre(){
        $dados = [
            'tituloPagina' => APP_NOME
        ];

        $this->view('paginas/sobre', $dados);
    }
    public function error(){
        $dados = [
            'tituloPagina' => 'Erro - Página não encontrada'
        ];

        $this->view('paginas/error', $dados);
    }
    
}