<?php
require_once 'db.php';
require_once 'autheticate.php';

$stmt = $pdo -> query("SELECT * FROM carros");

$carros = $stmt -> fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Carros</title>
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
        <h2>Lista de carros</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Data de Fabricação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $carro): ?>
                    <tr>
                        <td><?= $carro['id'] ?></td>
                        <td><?= $carro['modelo'] ?></td>
                        <td><?= $carro['marca'] ?></td>
                        <td><?= $carro['data_fabricacao'] ?></td>
                        <td>
                            <a href="read_car.php?id=<?= $carro['id'] ?>">Visualizar</a>
                            <a href="update_car.php?id=<?= $carro['id'] ?>">Editar</a>
                            <a href="delete_car.php?id=<?= $carro['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento da consessionária CSS</p>
    </footer>
</body>
</html>
