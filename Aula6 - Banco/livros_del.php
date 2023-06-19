<?php

require_once("Connection.php");
    
    $id = isset ($_GET['id']) ? $_GET['id'] : null;

    if($id){
        $conn = Connection::getConnection();
        $sql = "DELETE FROM livros WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

//Voltar para a página de livros
        header("Location: livros.php");
    }else {
        echo "Id não informado";
        echo "<br><br>";
        echo "<a href='livros.php'>Voltar</a>";
    }
      


?>