<?php
require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_film = $_POST['name_film'];
        $launch_film = $_POST['launch_film'];
        $genre_film = $_POST['genre_film'];

        $stmt = $pdo -> prepare("INSERT INTO movies (name_film, launch_film, genre_film) VALUES (?, ?, ?)");

        $stmt -> execute([$name_film, $launch_film, $genre_film]);

        header('Location: index_movie.php');
    } 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
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
        <h2>Adicionar Filme</h2>
        <form method="POST">
            <label for="name_film">Nome:</label>
            <input type="text" id="name_film" name="name_film" required>
            
            <label for="launch_film">Data de Lançamento:</label>
            <input type="date" id="launch_film" name="launch_film" required>
            
            <label for="genre_film">Gênero do filme:</label>
            <input type="text" id="genre_film" name="genre_film" required>
            
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Filmes</p>
    </footer>
</body>
</html>
