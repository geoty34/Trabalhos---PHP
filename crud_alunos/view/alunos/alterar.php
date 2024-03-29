<?php 
//View para alterar alunos

require_once(__DIR__ . "/../../controller/AlunoController.php");
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../model/Curso.php");

$msgErro = "";
$aluno = null;
$alunoCont = new AlunoController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : null;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;
    $idAluno = $_POST['id'];
    //echo $idAluno;
    //exit;
    
    //Criar um objeto Aluno para persistência
    $aluno = new Aluno();
    $aluno->setId($idAluno);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);
    if($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }

    //Criar um alunoController
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }



} else {
    //Usuário apenas entrou na página para alterar
    $idAluno = 0;
    if(isset($_GET['idAluno'])) {
        $idAluno = $_GET['idAluno'];

        $aluno = $alunoCont->buscarPorId($idAluno);
        if (! $aluno) {
            $msgErro = "Aluno não encontrado!<br>";
            echo "<a href='listar.php'>Voltar</a>";
        }
        //print_r($aluno);
    }

}

//Inclui o formulário
include_once(__DIR__ . "/form.php");