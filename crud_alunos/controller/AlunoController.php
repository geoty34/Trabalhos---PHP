<?php
    // Controller para Aluno

    require_once(__DIR__."/../dao/AlunoDAO.php");
    require_once(__DIR__."/../model/Aluno.php");
    require_once(__DIR__."/../service/AlunoService.php");
    
    class AlunoController {

        private $alunoDAO;
        private $alunoService;

        public function __construct() {
            $this->alunoDAO =  new AlunoDAO;
            $this->alunoService =  new AlunoService;
        }

        public function listar() {
           return $this->alunoDAO->list();
        }

        public function inserir(Aluno $aluno) {
            // Valida e retorna os erros caso exista
            $erros = $this->alunoService->validarDados($aluno);

            if ($erros) {
                return $erros;            

            // Persiste o objeto e retorna uma array vazia
            $this->alunoDAO->insert($aluno);
            return array();
        }
    }

}
?>