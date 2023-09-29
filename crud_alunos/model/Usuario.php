<?php
#Arquivo com a declaração da classe Usuario

class Usuario {

    private ?int $id;
    private ?string $nome;
    private ?string $login;
    private ?string $senha;

    //Construtor da classe
    public function __construct($id, $nome, $login, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }

   
    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getNome()
    {
        return $this->nome;
    }

   
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    
    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

   
    public function getSenha()
    {
        return $this->senha;
    }

 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}

?>