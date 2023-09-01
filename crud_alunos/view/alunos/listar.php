<?php 
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h2 style="color:darkseagreen"; >Listagem de alunos</h2>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div><br>

<table class="table"  style="color: green; background-color:darkseagreen;" align-items="center">
    <thead>
        <tr>
            <td>Nome</td>
            <td>Idade</td>
            <td>Estrangeiro</td>
            <td>Curso</td>
            <td>Alterar</td>
            <td>Excluir</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alunos as $a): ?>
            <tr>
                <td><?= $a->getNome(); ?></td>
                <td><?= $a->getIdade(); ?></td>
                <td><?= $a->getEstrangeiroTexto(); ?></td>
                <td><?= $a->getCurso(); ?></td>
                <td><a href="alterar.php?idAluno=<?= $a->getId(); ?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
              
                <td><a href="excluir.php?idAluno=<?= $a->getId(); ?>"
                     onclick="return confirm('Confirmar a exclusão?');"> 
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>
    
    
