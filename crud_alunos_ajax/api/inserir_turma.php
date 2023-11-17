<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__. "/../controller/TurmaController.php");
require_once(__DIR__. "/../model/Turma.php"); 
require_once(__DIR__. "/../model/Disciplina.php"); 

//  Captura os parametros POST
 
 $ano = is_numeric( $_POST['ano']) ? $_POST['ano'] : 0;
 $idCurso = is_numeric( $_POST['idCurso']) ? $_POST['idCurso'] : 0;
 $idDisc = is_numeric($_POST['idDisc']) ? $_POST['idDisc'] : 0;

 $turma = new Turma();
//  Sets de turma com os valores

$turma->setAno($ano);


if($idDisc){
    $disc = new Disciplina();
    $disc->setId($idDisc);
    $turma->setDisciplina($disc);
}
// print_r($turma);
    
//  Chamar o controller para salvar a turma

$turmaCont = new TurmaController();
$erros = $turmaCont->salvar($turma);

print_r($erros);

// Retornar os erros


//print_r($erros);
if($erros)
    $msgErro = implode("<br>", $erros);
echo $msgErro;


 
?>