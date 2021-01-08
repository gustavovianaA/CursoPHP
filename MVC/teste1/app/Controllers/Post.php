<?php
/* 
Controle de Postagens
Controlador responsavel pelo controle de dados e comunicação com o model de postagens
 */
class Post extends Controller
{

    public function __construct()
    {
        //chama os modelos responsáveis por fazer a comunicação com o banco de dados
        $this->postModel = $this->model('PostModel');
        $this->usuarioModel = $this->model('UsuarioModel');
        $this->categoriaModel = $this->model('CategoriaModel');
    }

    /* exibe as postagens na index */
    public function index($url)
    {
        $post = $this->postModel->lerPostPorUrl($url);

        if ($post == null) {
            Helper::redirecionar('paginas/error');
        }

        //chama o metodo para ler o usuario por seu ID no modelo Usuario
        $autor = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);
        $admin = $this->usuarioModel->lerAdmin();
        $categorias = $this->categoriaModel->lerCategorias();
        $categoria = $this->categoriaModel->lerCategoriaPorId($post->categoria_id);

        //define os dados da view
        $dados = [
            'post' => $post,
            'autor' => $autor,
            'categorias' => $categorias,
            'categoria' => $categoria,
            'admin' => $admin
        ];
        //define a view para ver o post
        $this->view('posts/ver', $dados);
    }


    public function buscar(){
        $busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);
        if(!empty($busca)){

            $posts = $this->postModel->busca($busca);
            $admin = $this->usuarioModel->lerAdmin();
            $categorias = $this->categoriaModel->lerCategorias();
            $total = $this->postModel->totalResultados();
            $resultado = $total > 1 ? 'resultados' : 'resultado';
    
            if ($posts == null) :
                Helper::mensagem('post', 'Sua busca por <b>'.$busca.'</b> não retornou nenhum resultado ', 'alert alert-info');
            else:
                Helper::mensagem('post', 'Sua busca por <b>'.$busca.'</b> retornou <b>'.$total.'</b> '.$resultado.' ', 'alert alert-info');
            endif;
            
            $dados = [
                'posts' => $posts,
                'admin' => $admin,
                'categorias' => $categorias
            ];
            $this->view('posts/busca', $dados);

        }else {
            Helper::mensagem('post','Para fazer uma busca preencha o campo de busca com ao menos uma palavra', 'alert alert-primary');
            Helper::redirecionar('./');
        }

    }
    
}
