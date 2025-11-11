<?php
require_once 'db.php';

$id_film = $_GET['id_film'];

$stmt = $pdo -> prepare("SELECT * FROM movies WHERE id_film = ?");

$stmt -> execute([$id_film]);

$movie = $stmt -> fetch(PDO :: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do filme</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Filmes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index_movie.php">Listar Filmes</a></li>
                <li><a href="create_movie.php">Adicionar Filme</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do Filme</h2>
        <?php if ($movie): ?>
            <p><strong>ID:</strong> <?= $movie['id_film'] ?></p>
            <p><strong>Nome:</strong> <?= $movie['name_film'] ?></p>
            <p><strong>Matrícula:</strong> <?= $movie['genre_film'] ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $movie['launch_film'] ?></p>
            <p>
                <a href="update_movie.php?id_film=<?= $movie['id_film'] ?>">Editar</a>
                <a href="delete_movie.php?id_film=<?= $movie['id_film'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Filme não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Filmes</p>
    </footer>
</body>
</html>