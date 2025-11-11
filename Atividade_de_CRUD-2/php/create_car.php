<?php
require_once 'db.php';
require_once 'autheticate.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $modelo = $_POST['modelo'];
   $marca = $_POST['marca'];
   $data_fabricacao = $_POST['data_fabricacao'];

   $stmt = $pdo -> prepare("INSERT INTO carros (modelo, marca, data_fabricacao) VALUES (?, ?, ?)");

   $stmt -> execute([$modelo, $marca, $data_fabricacao]);

   header('Location: index_car.php');
}
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento da concessionária CSS</h1>
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/index-carro.php">Listar carros</a></li>
                    <li><a href="/create-carro.php">Adicionar carro</a></li>
                    <li><a href="/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/user-login.php">Login</a></li>
                    <li><a href="/user-register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar carro</h2>
        <form method="POST">
            <label for="modelo">modelo:</label>
            <input type="text" id="modelo" name="modelo" required>            
            <label for="marca">marca:</label>
            <input type="text" id="marca" name="marca" required>            
            <label for="data_fabricacao">Data de fabricação:</label>
            <input type="date" id="data_fabricacao" name="data_fabricacao" required>            
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>
