<?php
require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $launch_date = $_POST['launch_date'];
        $film_genre = $_POST['film_genre'];

        $stmt = $pdo -> prepare("INSERT INTO movies (name, launch_date, film_genre) VALUES (?,?)");

        $stmt -> execute([$name, $launch_date, $film_genre]);
    } else {
        echo "não usou o metodo post";
    }
?>