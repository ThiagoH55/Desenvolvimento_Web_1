<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("
        SELECT consulta.id_cons,
        consulta.date_time_cons,
        consulta.obse_cons,
        pacientes.id_pac AS id_pac,
        pacientes.nome_pac AS nome_pac,
        medicos.id_med AS id_med,
        medicos.nome_med AS nome_med
        FROM consulta

        
        INNER JOIN pacientes ON consulta.id_pac = pacientes.id_pac
        INNER JOIN medicos ON consulta.id_med = medicos.id_med
        
        WHERE consulta.id_cons = ?
    ");

    $query->execute([$id]);
    $consulta = $query->fetch(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM medicos");
    $query->execute();
    $medicos = $query->fetchAll(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM pacientes");
    $query->execute();
    $pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_pac = $_POST['id_pac'];
        $id_med = $_POST['id_med'];
        $date_time_cons = $_POST['date_time_cons'];
        $obse_cons = $_POST['obse_cons'];

        $query = $pdo->prepare("UPDATE consulta SET id_pac = ?, id_med = ?, date_time_cons = ?, obse_cons = ? WHERE id_cons = ?");
        $query->execute([$id_pac, $id_med, $date_time_cons, $obse_cons, $id]);
        header("Location: ./view-consulta.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de consulta</title>
</head>
<body>
    <header>
        <h1>
            Edição de Consulta
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./view-consulta.php?id=<?= $id ?>" style="margin-left: 10px;">Voltar</a><br><br>

    </header>

    <form action="" method="post">

        <label for="id_pac">Paciente: </label><br>
        <select name="id_pac" id="id_pac" required>
            <option value="">Selecione</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['id_pac'] ?>" <?= $paciente['id_pac'] == $consulta['id_pac'] ? 'selected' : '' ?>>
                    <?= $paciente['nome_pac'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="id_med">Médico: </label><br>
        <select name="id_med" id="id_med" required>
            <option value="">Selecione</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['id_med'] ?>" <?= $medico['id_med'] == $consulta['id_med'] ? 'selected' : '' ?>>
                    <?= $medico['nome_med'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="date_time_cons">date_time_cons: </label><br>
        <input type="date" name="date_time_cons" id="date_time_cons" value="<?= $consulta['date_time_cons'] ?>" required><br>

        <label for="obse_cons">obse_cons: </label><br>
        <textarea type="text" name="obse_cons" id="obse_cons" class="obse_cons"><?= $consulta['obse_cons'] ?></textarea><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>