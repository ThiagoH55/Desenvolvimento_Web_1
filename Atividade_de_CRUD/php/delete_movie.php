<?php
require_once 'db.php';

$id_film = $_GET['id_film'];

$stmt = $pdo->prepare("DELETE FROM movies WHERE id_film = ?");

$stmt->execute([$id_film]);

echo "Filme deletado"
?>