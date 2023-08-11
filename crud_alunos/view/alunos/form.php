<?php

//Formulario para alunos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);

?>
<h3 style="color:darkseagreen;">Inserir Aluno</h3>

<form method="post" id="formAluno">
    <div>
        <label for="txtNome">Nome</label>
        <input type="text" name="nome" id="txtNome"/>

    </div><br>

    <div>
        <label for="txtIdade">Idade</label>
        <input type="number" name="idade" id="txtIdade"/>
    </div><br>

    <div>
        <label for="selEstrangeiro">Estrangeiro</label>
        <select name="estrangeiro" id="selEstrangeiro">
            <option value="">---Selecione---</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div><br>

    <div>
        <label for="selCurso">Curso</label>
        <select name="curso" id="selCurso">
            <option value="">---Selecione---</option>
            <?php foreach ($cursos as $c): ?>
                <option value="<?php echo $c->getId(); 
                ?>"><?php echo $c->getNome(); ?>
                </option>
            <?php endforeach; ?>
            
        </select>
    </div><br>
    <input type="hidden" name="submetido" value="1" />
    <Button type="submit">Gravar</Button>
    <Button type="reset">Limpar</Button>



</form>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>