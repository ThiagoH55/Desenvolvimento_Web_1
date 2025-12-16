<?php
    require_once "../config.php";

$stmt = $pdo -> query("SELECT * FROM pacientes");

$pacientes = $stmt -> fetchAll(PDO :: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD pacientes</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de pacientes</h1>
        <nav>
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <li><a href="create-paciente.php">Adicionar paciente</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de pacientes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Tipo sanguíneo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['id_pac'] ?></td><br>
                        <td><?= $paciente['nome_pac'] ?></td>
                        <td><?= $paciente['nasc_pac'] ?></td>
                        <td><?= $paciente['tip_sang_pac'] ?></td>
                        <td>
                            <td><a href="./view-paciente.php?id=<?= $paciente['id_pac']?>">Visualizar</a></td>
                        </td>
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