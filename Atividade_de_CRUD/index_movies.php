<?php
require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $stmt = $pdo->query("SELECT * FROM movies");

        $movies = $stmt->fetchAll(PDO :: FETCH_ASSOC);

        foreach ($movies as $movie) {
            echo $movie['id'] . " | " . $movie['name'] . " | " . $movie['launch_date'] . " | " . $movie['film_genre'];
        }
    } else {
        echo "não sou um metodo post";
    }
?>