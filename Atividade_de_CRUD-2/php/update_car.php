<?php
require_once 'db.php';
require_once 'autheticate.php';

$id = $_GET['id'];

$stmt = $pdo -> prepare("SELECT * FROM carros WHERE id = ?");

$stmt -> execute([$id]);

$carro = $stmt -> fetch(PDO :: FETCH_ASSOC);

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $data_fabricacao = $_POST['data_fabricacao'];

    $stmt = $pdo -> prepare("UPDATE carros SET modelo = ?, marca = ?, data_fabricacao = ? WHERE id = ?");

    $stmt -> execute([$modelo, $marca, $data_fabricacao, $id]);

    header('Location: index_car.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento da concessionária CSS</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index_carro.php">Listar carros</a></li>
                <li><a href="create_carro.php">Adicionar carro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar carro</h2>
        <form method="POST">
            <label for="modelo">modelo:</label>
            <input type="text" id="modelo" name="modelo" value="<?= $carro['modelo'] ?>" required>
            
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="<?= $carro['marca'] ?>" required>
            
            <label for="data_fabricacao">Data de Nascimento:</label>
            <input type="date" id="data_fabricacao" name="data_fabricacao" value="<?= $carro['data_fabricacao'] ?>" required>
                       
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento da concessionária CSS</p>
    </footer>
</body>
</html>
