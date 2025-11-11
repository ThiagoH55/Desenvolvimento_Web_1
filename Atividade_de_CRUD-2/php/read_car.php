<?php
require_once 'db.php';
require_once 'autheticate.php';

$id = $_GET['id'];

$stmt = $pdo -> prepare("SELECT * FROM carros WHERE id = ?");

$stmt -> execute([$id]);

$carro = $stmt -> fetch(PDO :: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Carro</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento da concessionária CSS</h1>
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/index_car.php">Listar carros</a></li>
                    <li><a href="/create_car.php">Adicionar carro</a></li>
                    <li><a href="/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/user_login.php">Login</a></li>
                    <li><a href="/user_register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do carro</h2>
        <?php if ($carro): ?>
            <p><strong>ID:</strong> <?= $carro['id'] ?></p>
            <p><strong>Modelo:</strong> <?= $carro['modelo'] ?></p>
            <p><strong>Marca:</strong> <?= $carro['marca'] ?></p>
            <p><strong>Data de Facricação:</strong> <?= $carro['data_fabricacao'] ?></p>
            <p>
                <a href="update_car.php?id=<?= $carro['id'] ?>">Editar</a>
                <a href="delete_car.php?id=<?= $carro['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Carro não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento da concessionária CSS</p>
    </footer>
</body>
</html>
