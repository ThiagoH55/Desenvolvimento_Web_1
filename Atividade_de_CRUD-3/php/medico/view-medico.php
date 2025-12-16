<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM medicos WHERE id_med = ?");
    $query->execute([$id]);
    $medico = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de médico</title>
</head>
<body>
    <header>
        <h1>
            Visualização de médico
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./index-medico.php" style="margin-left: 10px;">Voltar</a><br><br>
    </header>


    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $medico['id_med'] ?></td>
                <td><?= $medico['nome_med'] ?></td>
                <td><?= $medico['especialidade'] ?></td>

                <td><a href="./edit-medico.php?id=<?= $medico['id_med']?>">Editar</a></td>
                <td><a href="./delete-medico.php?id=<?= $medico['id_med']?>">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>