//Parte PHP
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connection.php");

?>

//Parte Html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
</head>
<body>
    <h2>Cadastro de filmes</h2>
    <h3>Formulário de filmes</h3>

    <form action="" method="post">
        <input type="text" name="nome" placeholder="Informe o nome">
        <br><br>

        <select name="genero">
            <option value="">---Selecione o gênero---</option>
            
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="s">Suspense</option>
            <option value="T">Terror</option>
            <option value="O">Outros</option>
        </select><br><br>

        <input type="text" name="diretor" placeholder="Informe o diretor" />
        <br><br>

        <input type="text" name="diretor" placeholder="Informe o diretor" />
        <br><br>

        <legend>Baseado em fatos reais</legend>
        <input type="radio" name="bas_fatosreais" id="bsr" />
        <label for="bsr">Sim</label>
        <br>

        <input type="radio" name="bas_fatosreais" id="bsr2" />
        <label for="bsr2">Não</label>
        <br><br>

        <input type="text" name="autor" placeholder="Informe o nome dos autores" />
        <br><br>




        <button type="submit">Cadastrar</button>

        <input type="hidden" name="submetido" value="1" />

    
    </form>
    
</body>
</html>