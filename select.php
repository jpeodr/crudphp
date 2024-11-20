<?php
include 'db.php';

$declaracao = $conn->query("SELECT * FROM posts");
$posts = $declaracao->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar dados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Posts</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Usuário</th>
                    <th>Conteúdo</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['usuario'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($post['conteudo'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="update.php?id=<?= $post['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete.php?id=<?= $post['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
