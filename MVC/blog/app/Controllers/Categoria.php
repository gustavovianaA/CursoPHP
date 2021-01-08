<?php
/* 
Controle de Categorias
Controlador responsavel pela exibição das categorias
 */
class Categoria extends Controller
{

    public function __construct()
    {
        $this->postModel = $this->model('PostModel');
        $this->usuarioModel = $this->model('UsuarioModel');
        $this->categoriaModel = $this->model('CategoriaModel');
    }

    public function index($url)
    {
        $post = $this->categoriaModel->lerPostsPorCategoria($url);

        if ($post == null) {
            Helper::mensagem('categoria', 'Nenhum post para exibir nessa categoria');
        }

        $admin = $this->usuarioModel->lerAdmin();
        $categorias = $this->categoriaModel->lerCategorias();
        $categoria = $this->categoriaModel->lerCategoriaPorUrl($url);

        $dados = [
            'posts' => $post,
            'categorias' => $categorias,
            'categoria' => $categoria,
            'admin' => $admin
        ];

        $this->view('categorias/index', $dados);
    }
    
}
