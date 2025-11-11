<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Bem vindos ao sistema de gerenciamento da concessionária CSS</h1>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="php/index_car.php">Listar Carros</a></li>
                <li><a href="php/create_car.php">Adicionar carro</a></li>
                <li><a href="php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else :?>
                    <li><a href="php/user_login.php">Login</a></li>
                    <li><a href="php/user_register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Bem-vindo ao CRUD de Carros</h2>
        <p>Utilize o menu a cima para navegar pelo sistema.</p>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de gerenciamento da concessionária CSS</p>
    </footer>
</body>
</html>