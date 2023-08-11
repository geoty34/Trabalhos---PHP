<?php
//Pagina view para listagem de alunos
require_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();

?>

<?php
require_once(__DIR__ . "/../include/header.php");
?>
<h2 style="color:darkseagreen; ">Listagem de Alunos</h2>

<div>
    <a href="inserir.php">Inserir</a>
</div>

<table border="1" style="color: green; background-color:darkseagreen;" align-items="center">
    <thead>
        <tr>
            <td>Nome</td>
            <td>Idade</td>
            <td>Estrangeiro</td>
            <td>Curso</td>
            <td>Alterar</td>
            <td style="color:blue;">Excluir</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($alunos as $a):?> 
            <tr>
                <td><?php echo $a->getNome();?></td>
                <td><?php echo $a->getIdade();?></td>
                <td><?php echo $a->getEstrangeiroTexto();?></td>
                <td><?php echo $a->getCurso()->getDesc();?></td>
                <td><a href="#"><img src="../../img/btn_editar.png"/></a></td>
                <td><a href="#"><img src="../../img/btn_excluir.png"/></a></td>
                    
            </tr>
        
        <?php endforeach; ?>

    </tbody>
</table>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>