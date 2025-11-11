<?php
require_once 'db.php';
require_once 'autheticate.php';

$id = $_GET['id'];

$stmt = $pdo -> prepare("DELETE FROM carros WHERE id = ?");

$stmt -> execute([$id]);

header('Location: index_car.php');
?>