<?php
    require_once "../config.php";

$stmt = $pdo -> query("SELECT * FROM medicos");

$medicos = $stmt -> fetchAll(PDO :: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD medicos</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de medicos</h1>
        <nav>
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <li><a href="create-medico.php">Adicionar medico</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de medicos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade do medico</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicos as $medico): ?>
                    <tr>
                        <td><?= $medico['id_med'] ?></td><br>
                        <td><?= $medico['nome_med'] ?></td>
                        <td><?= $medico['especialidade'] ?></td>
                        
                        <td><a href="./view-medico.php?id=<?= $medico['id_med']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Clinica Sebastião Custódio</p>
    </footer>
</body>
</html>