<?php

require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class LoginController
{


    private  LoginService $loginService;
    private UsuarioDAO $usuarioDAO;

    public function __construct()
    {

        $this->loginService = new LoginService();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function logar($usuario, $senha)
    {

        $erros = $this->loginService->validarDados($usuario, $senha);
        if ($erros)
            return $erros;

        // Buscando o usuario na base de dados pelo seu login e senha

        $usuario = $this->usuarioDAO->findByLoginSenha($usuario, $senha);
        if (!$usuario) {
            array_push($erros, "Usuário, ou senha inválidos!");
            return $erros;
        }

        // Salvar o usuário na sessão
        $this->loginService->salvarUsuarioSessao($usuario);


        return array();
    }
    public function verificaUsuarioLgado()
    {
        $nomeUsuario = $this->loginService->getNomeUsuarioSessao();
        if ($nomeUsuario)
            return true;

        return false;
    }
}
