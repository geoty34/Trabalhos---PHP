<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/LoginController.php");
//Pagina com o formulario de login

$msgErro = "";
$usuario = "";
$senha = "";

if (isset($_POST['submetido'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $loginCont = new LoginController();
    $erros = $loginCont->logar($usuario, $senha);


    // Redirecionar para a pagina inicial
    if(!$erros){
        header("location: " . BASE_URL);
        exit;
    }

    // Se tiver erros, exibe-os
    $msgErro = implode("<br>", $erros);

    //echo $msgErro;
    // echo $usuario . " - " . $senha;

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Crud Alunos</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <h3>Login</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-6 alert alert-info">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="txtUsu">Usuario</label>
                        <input type="text" class="form-control" 
                               name="usuario" id="txtUsu" 
                               value="<?= $usuario ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="txtUsu">Senha</label>
                        <input type="password" class="form-control" 
                               name="senha" id="txtSenha" 
                               value="<?= $senha ?>"/>
                    </div>
                    <input type="hidden" name="submetido" value="1" />

                    <button class="btn btn-info">Entrar</button>
                </form>
            </div>
            <div class="col-6">
                <?php if ($msgErro) : ?>
                    <div class="alert alert-danger">
                        <?= $msgErro ?>

                    </div>

                <?php endif; ?>


            </div>

        </div>

    </div>























    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</body>

</html>