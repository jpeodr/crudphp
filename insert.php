<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $conteudo = $_POST['conteudo'];

    $declaracao = $conn->prepare("INSERT INTO posts (usuario, conteudo, dataPostagem) VALUES (:usuario, :conteudo, NOW())");
    $declaracao->bindParam(':usuario', $usuario);
    $declaracao->bindParam(':conteudo', $conteudo);
    if ($declaracao->execute()) {
        header("Location: select.php");
        exit();
    } else {
        echo "Erro ao inserir post.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operações CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Insira os dados</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required>
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <input type="text" id="conteudo" name="conteudo" class="form-control" placeholder="Mensagem" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
