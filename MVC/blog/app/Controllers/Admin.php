<?php
/* 
Controle de Admin
Controlador responsavel pela administração do sistema
 */
class Admin extends Controller
{

    public function __construct()
    {
        //chama os modelos responsáveis por fazer a comunicação com o banco de dados
        $this->postModel = $this->model('PostModel');
        $this->usuarioModel = $this->model('UsuarioModel');
        $this->categoriaModel = $this->model('CategoriaModel');

        //adiciona os metodos do model as variaveis 
        $this->posts = $this->postModel->lerPosts();
        $this->categorias = $this->categoriaModel->lerCategorias();

        $admin = $this->usuarioModel->lerAdmin();
        if (!$admin->level == $_SESSION['usuario_level']) {
            session_destroy();
            Helper::redirecionar('./');
        }
    }

    /* exibe a view do admin */
    public function index()
    {
        $this->view('admin/index');
    }

    public function cadastrar($tipo)
    {
        if ($tipo == 'post') {
            $this->cadastrarPost();
        } elseif ($tipo == 'categoria') {
            $this->cadastrarCategoria();
        } else {
            Helper::redirecionar('paginas/error');
        }
    }
    public function editar($tipo, $id)
    {
        if ($tipo == 'post') {
            $this->editarPost($id);
        } elseif ($tipo == 'categoria') {
            $this->editarCategoria($id);
        } else {
            Helper::redirecionar('paginas/error');
        }
    }
    public function deletar($tipo, $id)
    {
        if ($tipo == 'post') {
            $this->deletarPost($id);
        } elseif ($tipo == 'categoria') {
            $this->deletarCategoria($id);
        } else {
            Helper::redirecionar('paginas/error');
        }
    }

    public function listar($tipo)
    {
        if ($tipo == 'posts') {
            $this->listarPosts();
        } elseif ($tipo == 'categorias') {
            $this->listarCategorias();
        } else {
            Helper::redirecionar('paginas/error');
        }
    }

    /* checa e cadastra posts */
    private function cadastrarPost()
    {

        //recebe os dados do formulario e os filtra
        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($formulario)) :
            $dados = [
                'categoria_id' => trim($formulario['categoria']),
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'usuario_id' => $_SESSION['usuario_id'],
                'categoria_erro',
                'titulo_erro' => '',
                'texto_erro' => '',
                'categorias' => $this->categorias,
            ];

            //checa campos em branco
            if (in_array("", $formulario)) :

                if (empty($formulario['categoria'])) :
                    $dados['categoria_erro'] = 'Selecione uma Categoria';
                endif;

                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if (empty($formulario['texto'])) :
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;

            else :
                //chama o metodo armazenar do modelo Post para cadastrar os dados no banco de dados
                if ($this->postModel->armazenar($dados)) :
                    Helper::mensagem('post', 'Post cadastrado com sucesso');
                    Helper::redirecionar('admin/listar/posts');
                else :
                    die("Erro ao armazenar post no banco de dados");
                endif;

            endif;
        else :
            $dados = [
                'categorias' => $this->categorias,
                'titulo' => '',
                'texto' => '',
                'categoria_erro' => '',
                'titulo_erro' => '',
                'texto_erro' => ''
            ];

        endif;
        //define a view do formulario de cadastro de posts
        $this->view('admin/posts/cadastrar', $dados);
    }

    private function cadastrarCategoria()
    {

        //recebe os dados do formulario e os filtra
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'titulo_erro' => '',
                'texto_erro' => ''
            ];

            //checa campos em branco
            if (in_array("", $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if (empty($formulario['texto'])) :
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;

            else :
                if ($this->categoriaModel->armazenar($dados)) :
                    Helper::mensagem('categoria', 'Categoria cadastrada com sucesso');
                    Helper::redirecionar('admin/listar/categorias');
                else :
                    die("Erro ao armazenar categoria no banco de dados");
                endif;

            endif;
        else :
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => ''
            ];

        endif;
        $this->view('admin/categorias/cadastrar', $dados);
    }

    /* checa e edita os dados do post por seu ID */
    private function editarPost($id)
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (isset($formulario)) :
            $dados = [
                'id' => $id,
                'categoria_id' => trim($formulario['categoria']),
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'titulo_erro' => '',
                'texto_erro' => ''
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if (empty($formulario['texto'])) :
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;

            else :
                if ($this->postModel->atualizar($dados)) :
                    Helper::mensagem('post', 'Post atualizado com sucesso');
                    Helper::redirecionar('admin/listar/posts');
                else :
                    die("Erro ao atualizar o post");
                endif;

            endif;
        else :
            $post = $this->postModel->lerPostPorId($id);

            $dados = [
                'id' => $post->id,
                'categorias' => $this->categorias,
                'categoria_id' => $post->categoria_id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => ''
            ];

        endif;

        $this->view('admin/posts/editar', $dados);
    }


    private function editarCategoria($id)
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'id' => $id,
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'titulo_erro' => '',
                'texto_erro' => ''
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if (empty($formulario['texto'])) :
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;

            else :
                if ($this->categoriaModel->atualizar($dados)) :
                    Helper::mensagem('categoria', 'Categoria atualizada com sucesso');
                    Helper::redirecionar('admin/listar/categorias');
                else :
                    die("Erro ao atualizar a categoria");
                endif;

            endif;
        else :
            $categoria = $this->categoriaModel->lerCategoriaPorId($id);
            $dados = [
                'id' => $categoria->id,
                'titulo' => $categoria->titulo,
                'texto' => $categoria->texto,
                'titulo_erro' => '',
                'texto_erro' => ''
            ];
        endif;
        $this->view('admin/categorias/editar', $dados);
    }

    private function deletarPost($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);
        if ($id && $metodo == 'POST') :
            if ($this->postModel->destruir($id)) :
                Helper::mensagem('post', 'Post deletado com sucesso!');
                Helper::redirecionar('admin/listar/posts');
            endif;
        endif;
    }
    private function deletarCategoria($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);
        if ($id && $metodo == 'POST') :
            if ($this->categoriaModel->checarPosts($id)) :
                Helper::mensagem('categoria', 'Essa categoria não pode ser deletada, pois tem post cadastrado nela, delete ou altere a categoria do post!', 'alert alert-warning');
                Helper::redirecionar('admin/listar/categorias');
            else :
                if ($this->categoriaModel->destruir($id)) :
                    Helper::mensagem('categoria', 'Categoria deletada com sucesso!');
                    Helper::redirecionar('admin/listar/categorias');
                endif;
            endif;

        endif;
    }


    private function listarPosts()
    {
        $dados = [
            'posts' => $this->posts,
        ];
        $this->view('admin/posts/listar', $dados);
    }

    private function listarCategorias()
    {

        $dados = [
            'categorias' => $this->categorias
        ];
        $this->view('admin/categorias/listar', $dados);
    }
}
