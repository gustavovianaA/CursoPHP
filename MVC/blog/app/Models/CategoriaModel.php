<?php
/* Categoria Model - Classe responsavel pelas categorias e a comunicação com o banco de dados */
class CategoriaModel
{
    private $db;
    private $tabela = 'categorias';

    public function __construct()
    {
        //instancia a classe de conexão com o banco de dados
        $this->db = new Database();
    }

    //le todas as categorias 
    public function lerCategorias()
    {
        $this->db->query("SELECT * FROM {$this->tabela} ORDER BY titulo ASC");
        return $this->db->resultados();
    }
    //le os posts referente a categoria
    public function lerPostsPorCategoria($url)
    {

        //criar função para buscar o ID da categoria

        $t = $this->categoriaId($url);

        $this->db->query("SELECT 
        p.id as postId,
        p.url as postUrl, 
        p.capa as postCapa,
        p.titulo as postTitulo,
        p.texto as postTexto,
        p.criado_em as postDataCadastro, 
        c.titulo as categoriaTitulo,
        c.texto as categoriaTexto,
        u.nome as postAutor

         FROM posts AS p
         INNER JOIN categorias AS c
         ON p.categoria_id = c.id
         INNER JOIN usuarios AS u
         ON p.usuario_id = u.id
         WHERE p.categoria_id = $t
         ORDER BY p.id DESC
        ");

        $this->db->bind('url', $url);
        return $this->db->resultados();
    }

    //busca o id da categoria pela url amigavel
    private function categoriaId($url)
    {
        $this->db->query("SELECT id FROM {$this->tabela} WHERE url = :url");
        $this->db->bind('url', $url);

        return $this->db->resultado()->id;
    }

    //armazena a categoria no banco de dados
    public function armazenar($dados)
    {
        $dados['url'] = $this->checarTitulo($dados['titulo']);

        $this->db->query("INSERT INTO {$this->tabela}(url, titulo, texto) VALUES (:url, :titulo, :texto)");

        $this->db->bind("url", $dados['url']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    //atualiza a categoria no banco de dados
    public function atualizar($dados)
    {
        $dados['url'] = $this->checarTitulo($dados['titulo'], $dados['id']);

        $this->db->query("UPDATE {$this->tabela} SET url = :url, titulo = :titulo, texto = :texto, atualizado_em = NOW() WHERE id = :id");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("url", $dados['url']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    //le categoria no banco de dados por seu ID
    public function lerCategoriaPorId($id)
    {
        $this->db->query("SELECT * FROM {$this->tabela} WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    //le categoria no banco de dados por sua url amigavel
    public function lerCategoriaPorUrl($url)
    {
        $this->contarVisitas($url);

        $this->db->query("SELECT * FROM {$this->tabela} WHERE url = :url");
        $this->db->bind('url', $url);

        return $this->db->resultado();
    }

    //deleta a categoria no banco de dados por seu ID
    public function destruir($id)
    {
        $this->db->query("DELETE FROM {$this->tabela}  WHERE id = :id");
        $this->db->bind("id", $id);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    // checa se a categoria tem posts 
    public function checarPosts($id)
    {
        $this->db->query("SELECT * FROM posts WHERE categoria_id = :id");
        $this->db->bind("id", $id);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function checarTitulo($titulo, $id = null)
    {
        $sql = (!empty($id) ? "id != {$id} AND" : "");

        $this->db->query("SELECT * FROM {$this->tabela} WHERE {$sql} titulo = :t");
        $this->db->bind('t', $titulo);


        if ($this->db->resultado()) :
            return Helper::urlAmigavel($titulo) . '-' . substr(uniqid(), 8);
        else :
            return Helper::urlAmigavel($titulo);
        endif;
    }

    private function contarVisitas($url)
    {
        $this->db->query("UPDATE {$this->tabela} SET visitas = visitas + 1, data_ultima_visita = NOW() WHERE url = :u");

        $this->db->bind("u", $url);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
