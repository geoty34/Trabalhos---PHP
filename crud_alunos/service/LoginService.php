<?php
    //Seviço para login

    require_once(__DIR__ ."/../model/Usuario.php");

    class LoginService{

        public function validarDados($usuario, $senha) {
            $erros = array();

            //Validar se o campo usuário foi preenchido
            if(! $usuario) {
                array_push($erros, "Informe o usuario!");
            }

            if(! $senha) {
                array_push($erros, "Informe a senha!");
            }
    



            return $erros;

        }
        public function salvarUsuarioSessao($usuario)
        {
            session_start();
    
            $_SESSION['USU_ID'] = $usuario->getId();
            $_SESSION['USU_NOME'] = $usuario->getNome();
        }

        // Retorna o nome do usuario logado no sistema
        public function getNomeUsuarioSessao(){
            session_start();

            if(isset($_SESSION['USU_NOME']))
            return $_SESSION['USU_NOME'];

            return null;


        }
    }
?>
