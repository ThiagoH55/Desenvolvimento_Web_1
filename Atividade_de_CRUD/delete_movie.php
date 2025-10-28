<?php
require_once

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");

$stmt->execute([$id]);

echo "Filme deletado"
?>