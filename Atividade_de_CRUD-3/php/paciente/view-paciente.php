<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM pacientes WHERE id_pac = ?");
    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de paciente</title>
</head>
<body>
    <header>
        <h1>
            Visualização de paciente
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./lista_paciente.php" style="margin-left: 10px;">Voltar</a><br><br>
    </header>


    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $paciente['id_pac'] ?></td>
                <td><?= $paciente['nome_pac'] ?></td>
                <td><?= $paciente['nasc_pac'] ?></td>
                <td><?= $paciente['tip_sang_pac'] ?></td>

                <td><a href="./edit-paciente.php?id=<?= $paciente['id_pac']?>">Editar</a></td>
                <td><a href="./delete-paciente.php?id=<?= $paciente['id_pac']?>">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>