<?php
    // Formulário para alunos

    include_once(__DIR__."/../../controller/CursoController.php");
    include_once(__DIR__."/../include/header.php");

    $cursoCont = new CursoController();
    $cursos = $cursoCont->listar();
    // print_r($cursos);
?>

    <h3>Inserir Alunos</h3>

    <form action="" method="POST" id="form">

        <div class="form-group">
            <label for="txtNome">Nome:</label>
            <input type="text" name="nome" id="txtNome" class="form-control"
                value="<?php echo ($aluno ? $aluno->getNome() : '')?>"/>
        </div> 

        <br>

        <div class="form-group">
            <label for="txtIdade">Idade:</label>
            <input type="number" name="idade" id="txtIdade" class="form-control"
                value="<?php echo ($aluno ? $aluno->getIdade() : '')?>"/>
        </div>

        <br>

        <div class="form-group"> 
            <label for="selEstrange">Estrangeiro:</label>
            <select name="estrang" id="selEstrange" class="form-control">
                <option value="">--Selecione--</option>
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select>
        </div>

        <br>
        
        <div class="form-group">
            <label for="selCurso">Curso:</label>
            <select name="curso" id="selCurso" class="form-control">
                <option value="">--Selecione o Curso--</option>
                <?php foreach($cursos as $curso): ?>
                    <option value="<?= $curso->getId(); ?>">
                        <?= $curso->getNome(); ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <br>

        <input type="hidden" name="submetido" value="1"/>
        
        <button type="submit">Gravar</button>
        <button type="reset">Limpar</button>
        
    </form>

    <br>
    <a href="listar.php">Voltar</a>

<?php
    include_once(__DIR__."/../include/footer.php");
?>