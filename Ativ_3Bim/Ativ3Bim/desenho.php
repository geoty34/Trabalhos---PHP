<!-- Parte PHP -->

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connection.php");

$conn = Connection::getConnection();

$msgErro = "";

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$per_favorito = isset($_POST['per_favorito']) ? $_POST['per_favorito'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$cor = isset($_POST['cor']) ? $_POST['cor'] : null;
$url_img = isset($_POST['url_img']) ? $_POST['url_img'] : null;

if (isset($_POST['submetido'])) {
    //Validar os dados
    if (!$nome) {
        $msgErro .= "Informe o nome do desenho <br>";
    } else if (!$per_favorito) {
        $msgErro .= "Informe seu personagem preferido <br>";
    } else if (!$ano) {
        $msgErro = "Informe o Ano de Lançamento <br>";
    } else if (!$cor) {
        $msgErro = "Informe uma cor <br>";
    } else if (!$url_img) {
        $msgErro = "Informe a URL da imagem <br>";
    } else {

        $sql = 'INSERT INTO desenhos (nome, per_favorito, ano, cor, url_img)' .
            ' VALUES (?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $per_favorito, $ano, $cor, $url_img]);

        header('Location: desenho.php');
    }
}

?>
<!-- Parte Html -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="" href="style.css">
    <link rel="" href="cards.html">
    <title>Album de desenhos animados</title>
</head>

<body style="align-items: center;">



    <form action="" method="post" class="global" style="align-items: center;">
        <h1 class="h1">Monte seu album</h1>
        <input type="text" name="nome" placeholder="Informe o nome do desenho"><br><br>

        <input type="text" name="per_favorito" placeholder="Informe seu personagem favorito"><br><br>

        <input type="number" name="ano" placeholder="Informe o Ano de lançamento"><br><br>

        <strong>Adicione o link da imagem:</strong>
        <input type="url" name="img" id="img"><br><br>
        <strong>Selecione a cor de fundo do album:</strong>
        <!--<label for="cor" style="font-family: ;" >Selecione a cor do album:</label>-->
        <input type="color"><br><br>



        <input type="submit" value="Criar">

        <div class="container">
            <div class="row">

            </div>

        </div>
        <!-- Mensagem de Erro-->

        <div id="divErro" style="color:red; text-align:center; padding: 3px ">
            <?php echo "<p>$msgErro</p>"; ?>

        </div>


        <!-- Parte de baixo do form -->

        <input type="hidden" name="submetido" value="1" />



        <!--CARD-->


        <!-- Listagem dos livros -->

        <?php
        $sql = "SELECT * FROM desenhos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        //echo "<pre>" . print_r($result) . "<pre>";

        ?>
        <?php if (count($result) > 0) : ?>

            <table border="1" cellpadding=5>
                <tr class="tt">
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Personagem</td>
                    <td>Ano de produção</td>
                    <td>Cor</td>
                    <td>URL</td>


                    <td>Excluir</td>


                </tr>


                <?php foreach ($result as $reg) : ?>
                    <tr>
                        <td> <?php echo $reg['id'] ?> </td>
                        <td> <?php echo $reg['nome'] ?> </td>
                        <td>
                            <?php



                            echo '<style>color:aqua</style>' ?>
                        </td>
                        <td> <?php echo $reg['per_favorito'] ?> </td>


                        <td> <?php echo $reg['ano'] ?> </td>
                        <td> <?php echo $reg['cor'] ?> </td>
                        <td> <?php echo $reg['url_img'] ?> </td>




                        <td> <a href="desenho_del.php?id=<?php echo $reg['id'] ?>" onclick="return confirm('Confirma a exclusão?');">
                                Excluir</a></td>

                    </tr>

                <?php endforeach; ?>



            </table>

            <div class="direita">


            <?php endif; ?>
            </div>
            </div>



    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>