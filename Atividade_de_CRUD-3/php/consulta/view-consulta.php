<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("
        SELECT consulta.id_cons,
            consulta.date_time_cons,
            consulta.obse_cons,
            pacientes.id_pac AS id_pac,
            pacientes.nome_pac AS nome_pac,
            pacientes.nasc_pac AS nasc_pac,
            pacientes.tip_sang_pac AS tip_sang_pac,
            medicos.id_med AS id_med,
            medicos.nome_med AS nome_med,
            medicos.especialidade AS especialidade
        FROM consulta
        
        INNER JOIN pacientes ON consulta.id_pac = pacientes.id_pac
        INNER JOIN medicos ON consulta.id_med = medicos.id_med
        
        WHERE consulta.id_cons = ?


    ");
    $query -> execute([$id]);
    $consultas = $query -> fetchAll(PDO::FETCH_ASSOC);

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
            Visualização de consulta
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./lista_consulta.php?" style="margin-left: 10px;">Voltar</a><br><br>

    </header>


    <table border="2">
        <thead>
            <tr> 
                <th colspan="4">consulta</th>
                <th colspan="4">paciente</th>
                <th colspan="3">Médico</th>
                <th rowspan="2" colspan="2">Ações</th>
            </tr>

            <tr>
                <th>ID</th>
                <th>Data e hora</th>
                <th>Observação</th>

                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>

                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $consulta['id_cons'] ?></td>
                    <td><?= $consulta['date_time_cons'] ?></td>
                    <td><?= $consulta['obse_cons'] ?></td>
                    <td><?= $consulta['id_pac'] ?></td>
                    <td><?= $consulta['nome_pac'] ?></td>
                    <td><?= $consulta['nasc_pac'] ?></td>
                    <td><?= $consulta['tip_sang_pac'] ?></td>
                    <td><?= $consulta['id_med'] ?></td>
                    <td><?= $consulta['nome_med'] ?></td>
                    <td><?= $consulta['especialidade'] ?></td>

                    <td><a href="./edit-consulta.php?id=<?= $consulta['id_cons']?>">Editar</a></td>
                    <td><a href="./delete-consulta.php?id=<?= $consulta['id_cons']?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>