<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connection.php");

$conn = Connection::getConnection();
//print_r($conn);

if (isset($_POST['submetido'])) {

    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $genero = isset($_POST['genero']) ? $_POST['genero'] : null;
    $qtd_paginas = isset($_POST['qtd_paginas']) ? $_POST['qtd_paginas'] : null;
    $autor = isset($_POST['autor']) ? $_POST['autor'] : null;

    $sql = 'INSERT INTO livros (titulo, genero, qtd_paginas, autor)' .
        ' VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titulo, $genero, $qtd_paginas, $autor]);

    header('Location: livros.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>

</head>

<body>
    <h2>Cadastro de livros</h2>

    <h3>Formulario de livros</h3>
    <form action="" method="POST">
        <input type="text" name="titulo" placeholder="Informe o titulo" /><br><br>

        <select name="genero">
            <option value="">---Selecione o gênero---</option>
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="T">Terror</option>
            <option value="O">Outros</option>
        </select><br><br>

        <input type="number" name="qtd_paginas" placeholder="Informe a quantidade de páginas" />
        <br><br>

        <input type="text" name="autor" placeholder="Informe o nome do autor" />
        <br><br>


        <button type="submit">Cadastrar</button>

        <input type="hidden" name="submetido" value="1" />

    </form>

    <h4>Listagem de livros</h4>
    <?php
    $sql = "SELECT * FROM livros";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

    //echo "<pre>" . print_r($result) . "<pre>";

    ?>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>Título</td>
            <td>Gêrero</td>
            <td>Qt-Páginas</td>
            <td>Autor</td>
            <td></td>


        </tr>

        <?php foreach ($result as $reg) : ?>
            <tr>
                <td> <?php echo $reg['id'] ?> </td>
                <td> <?php echo $reg['titulo'] ?> </td>
                <td>
                    <?php

                    switch ($reg['genero']) {
                        case 'D':
                            echo "Drama";
                            break;
                        case  'F':
                            echo "Ficção";
                            break;
                        case 'R':
                            echo "Romance";
                            break;
                        case 'T':
                            echo "Terror";
                            break;
                        case 'O':
                            echo "Outros";
                            break;
                    }

                    ?>
                </td>


                <td> <?php echo $reg['qtd_paginas'] ?> </td>
                <td> <?php echo $reg['autor'] ?> </td>

                <td> <a href="livros_del.php?id=<?php echo $reg['id'] ?>"
                onclick="return confirm('Confirma a exclusão?');">
                        Excluir</a></td>

            </tr>

        <?php endforeach; ?>



    </table>

</body>

</html>