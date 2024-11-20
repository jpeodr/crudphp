<?php
// Detalhe: aqui você coloca o ip do seu servidor, usuario, senha e nome do banco.
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "bancophp";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn -> exec("USE $dbname");
} catch (PDOException $msg){
    echo "ERRO: ". $msg->getMessage();
}

?>
