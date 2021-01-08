<?php

/* Post Model - Classe responsavel pelos posts e a comunicação com o banco de dados */

class PostModel {

    //atributo privado para manipular o banco de dados
    private $db;
    private $tabela = 'posts';

    public function __construct() {
        //instancia a classe de conexão com o banco de dados
        $this->db = new Database();
    }

    public function lerPostsLimit($limit){
        $limit = "LIMIT $limit";
        return $this->lerPostsDB($limit);
    }

    public function lerPosts(){
        $limit = '';
        return $this->lerPostsDB($limit);
    }
    
    public function lerPostsDB($limit) {
        //consulta com associações de tabelas
        //INNER JOIN permite usar um operador de comparação para comparar os valores de colunas provenientes de tabelas associadas.
        $this->db->query("SELECT *,
        posts.id as postId,
        posts.criado_em as postDataCadastro,
        usuarios.id as usuarioId,
        usuarios.criado_em as usuarioDataCadastro
         FROM posts
         INNER JOIN usuarios ON
         posts.usuario_id = usuarios.id
         ORDER BY posts.id DESC $limit
         ");
        return $this->db->resultados();
    }

    //armazena o post no banco de dados
    public function armazenar($dados) {

        $dados['url'] = $this->checarTitulo($dados['titulo']);

        $this->db->query("INSERT INTO {$this->tabela} (usuario_id, categoria_id, url, titulo, texto) VALUES (:usuario_id, :categoria_id, :url, :titulo, :texto)");

        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("categoria_id", $dados['categoria_id']);
        $this->db->bind("url", $dados['url']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    //atualiza o post no banco de dados
    public function atualizar($dados) {
        $dados['url'] = $this->checarTitulo($dados['titulo'], $dados['id']);

        $this->db->query("UPDATE {$this->tabela} SET categoria_id = :categoria_id, url = :url, titulo = :titulo, texto = :texto, atualizado_em = NOW() WHERE id = :id");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("categoria_id", $dados['categoria_id']);
        $this->db->bind("url", $dados['url']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    //le post no banco de dados por seu ID
    public function lerPostPorId($id) {
        $this->db->query("SELECT * FROM {$this->tabela} WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    //le post no banco de dados por sua url amigável
    public function lerPostPorUrl($url) {
        $this->contarVisitas($url);
        
        $this->db->query("SELECT * FROM {$this->tabela} WHERE url = :url");
        $this->db->bind('url', $url);
        return $this->db->resultado();
    }

    //deleta o post no banco de dados por seu ID
    public function destruir($id) {
        $this->db->query("DELETE FROM {$this->tabela}  WHERE id = :id");
        $this->db->bind("id", $id);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function busca($busca) {
        $this->db->query("SELECT * FROM {$this->tabela} WHERE (titulo LIKE '%' :busca '%' OR texto LIKE '%' :busca '%' ) ORDER BY id DESC");
        $this->db->bind('busca', $busca);

        return $this->db->resultados();
    }

    public function totalResultados() {
        return $this->db->totalResultados();
    }

    public function checarTitulo($titulo, $id = null) {
        $sql = (!empty($id) ? "id != {$id} AND" : "");

        $this->db->query("SELECT * FROM {$this->tabela} WHERE {$sql} titulo = :t");
        $this->db->bind('t', $titulo);


        if ($this->db->resultado()) :
            return Helper::urlAmigavel($titulo) . '-' . substr(uniqid(), 8);
        else :
            return Helper::urlAmigavel($titulo);
        endif;
    }
    
    private function contarVisitas($url) {  
        $this->db->query("UPDATE {$this->tabela} SET visitas = visitas + 1, data_ultima_visita = NOW() WHERE url = :u");

        $this->db->bind("u", $url);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

}
