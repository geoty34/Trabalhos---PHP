<?php
    // Arquivo que verifica se o Usuárion está logado
    require_once(__DIR__ . "/../../controller/LoginController.php");

    $loginCont = new LoginController();
   if(! $loginCont->verificaUsuarioLgado())
   header("location: " . BASE_URL . "/view/login/login.php");

    
?>