<?php

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checarEmail($email)
    {
        $this->db->query("SELECT email FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuarios(nome, email, senha) VALUES (:nome, :email, :senha)");

        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function atualizar($dados)
    {
        $this->db->query("UPDATE usuarios SET avatar = :avatar, nome = :nome, email = :email, senha = :senha, biografia = :biografia, facebook = :facebook, youtube = :youtube, instagram = :instagram WHERE id = :id");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("avatar", $dados['avatar']);
        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);
        $this->db->bind("biografia", $dados['biografia']);
        $this->db->bind("facebook", $dados['facebook']);
        $this->db->bind("youtube", $dados['youtube']);
        $this->db->bind("instagram", $dados['instagram']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }


    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM usuarios WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function lerAdmin(){
        $this->db->query("SELECT * FROM usuarios WHERE level = 3");
        return $this->db->resultado();
    }

}
