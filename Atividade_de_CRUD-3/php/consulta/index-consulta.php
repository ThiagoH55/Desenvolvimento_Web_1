<?php 
    require_once '../config.php';

    $query= $pdo->prepare("
        SELECT consulta.id_cons,
            consulta.date_time_cons,
            pacientes.id_pac AS id_pac,
            pacientes.nome_pac AS nome_pac,
            medicos.nome_med AS nome_med,
            medicos.especialidade AS especialidade
        FROM consulta

        INNER JOIN pacientes ON consulta.id_pac = pacientes.id_pac
        INNER JOIN medicos ON consulta.id_med = medicos.id_med

        ORDER BY consulta.id_cons
    ");
    $query->execute();
    $consultas = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de consultas</title>
</head>
<body>
    <header>
        <h1>
            Listagem de consultas
        </h1>

        <a href="../../index.php">Home</a><br><br>
        
    </header>

    <?php if (!empty($consultas)): ?>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>ID do paciente</th>
                    <th>Nome do paciente</th>
                    <th>Nome do médico</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['id_cons'] ?></td>
                        <td><?= $consulta['date_time_cons'] ?></td>
                        <td><?= $consulta['id_pac'] ?></td>
                        <td><?= $consulta['nome_pac'] ?></td>
                        <td><?= $consulta['nome_med'] ?></td>
                        <td><?= $consulta['especialidade'] ?></td>

                        <td><a href="./view-consulta.php?id=<?= $consulta['id_cons']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    <?php else: ?>
        <p>Nenhuma consulta cadastrada</p>
    <?php endif?>

</body>
</html>