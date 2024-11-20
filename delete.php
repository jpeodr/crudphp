<?php
include 'db.php';

$id = $_GET['id'];

if (isset($id) && is_numeric($id)) {
    $declaracao = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $declaracao->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($declaracao->execute()) {
// aqui ele redireciona
        header("Location: select.php");
        exit(); // sai depois que redireciona
    } else {
        echo "errooou";
    }
} else {
    echo "id inválido ou ausente";
}
?>
