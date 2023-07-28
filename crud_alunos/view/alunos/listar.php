<?php
//Pagina view para listagem de alunos
require_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
print_r($alunos);
?>

<?php
require_once(__DIR__ . "/../include/header.php");
?>
<h2 style="color:darkseagreen; ">Listagem de Alunos</h2>

<table border="1" style="color: darkseagreen; background-color:green;">
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

    </tbody>
</table>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>