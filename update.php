<?php
include 'db.php';

$id = $_GET['id'];


$declaracao = $conn->prepare("SELECT * FROM posts WHERE id = :id");
$declaracao->bindParam(':id', $id);
$declaracao->execute();
$post = $declaracao->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novo_usuario = $_POST['usuario'];
    $novo_conteudo = $_POST['conteudo'];


    $declaracao = $conn->prepare("UPDATE posts SET usuario = :usuario, conteudo = :conteudo WHERE id = :id");
    $declaracao->bindParam(':usuario', $novo_usuario);
    $declaracao->bindParam(':conteudo', $novo_conteudo);
    $declaracao->bindParam(':id', $id);
    $declaracao->execute();

    header("Location: select.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Atualizar Post</h1>
        <form action="" method="POST" class="mt-4">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" class="form-control" value="<?= htmlspecialchars($post['usuario'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea id="conteudo" name="conteudo" class="form-control" rows="4" required><?= htmlspecialchars($post['conteudo'], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
            <a href="select.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
