<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Teste de conexão
require_once(__DIR__ . "/util/Connection.php");
$connection = Connection::getConnection();
print_r($connection);