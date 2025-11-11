<?php
require_once 'db.php';

$stmt = $pdo -> query("SELECT * FROM movies");

$movies = $stmt -> fetchAll(PDO :: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD movies</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de filmes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index_movie.php">Listar filmes</a></li>
                <li><a href="create_movie.php">Adicionar filmee</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de filmes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Gênero do filme</th>
                    <th>Data de Lançamento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?= $movie['id_film'] ?></td><br>
                        <td><?= $movie['name_film'] ?></td>
                        <td><?= $movie['genre_film'] ?></td>
                        <td><?= $movie['launch_film'] ?></td>
                        <td>
                            <a href="read_movie.php?id_film=<?= $movie['id_film'] ?>">Visualizar</a>
                            <a href="update_movie.php?id_film=<?= $movie['id_film'] ?>">Editar</a>
                            <a href="delete_movie.php?id_film=<?= $movie['id_film'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>
