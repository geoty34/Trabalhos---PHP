<?php
require_once("Connection.php");
    
$id = isset ($_GET['id']) ? $_GET['id'] : null;

if($id){
    $conn = Connection::getConnection();
    $sql = "DELETE FROM desenho WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

   //Voltar para a página de inicial
    header("Location: desenho.php");
}else {
    echo "Id não informado";
    echo "<br><br>";
    echo "<a href='desenho.php'>Volte</a>";
}


?>