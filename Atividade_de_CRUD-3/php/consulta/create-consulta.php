<?php 
    require_once '../config.php';

    $query= $pdo -> prepare("SELECT * FROM medicos");
    $query -> execute();
    $medicos = $query -> fetchAll(PDO::FETCH_ASSOC);

    $query= $pdo -> prepare("SELECT * FROM pacientes");
    $query -> execute();
    $pacientes = $query -> fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_med = $_POST['id_med'];
        $id_pac = $_POST['id_pac'];
        $date_time_cons = $_POST['date_time_cons'];
        $obse_cons = $_POST['obse_cons'];

        $query = $pdo->prepare("INSERT INTO consulta (id_med, id_pac, date_time_cons, obse_cons) VALUES (?, ?, ?, ?)");
        $query->execute([$id_med, $id_pac, $date_time_cons, $obse_cons]);
        header("Location: ./lista_consulta.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de consulta</title>
</head>
<body>
    <header>
        <h1>
            Cadastro de consulta
        </h1>

        <a href="../../index.php">Home</a><br><br>
        
    </header>

    <form action="" method="post">

        <label for="id_pac">Paciente: </label><br>
        <select name="id_pac" id="id_pac" required>
            <option value="">Selecione</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['id_pac'] ?>"><?= $paciente['nome_pac'] ?></option>
            <?php endforeach; ?>
        </select><br>



        <label for="id_med">Médico: </label><br>
        <select name="id_med" id="id_med" required>
            <option value="">Selecione</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['id_med'] ?>"><?= $medico['nome_med'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="date_time_cons">Data: </label><br>
        <input type="date" name="date_time_cons" id="date_time_cons" required><br>

        <label for="obse_cons">Observação: </label><br>
        <textarea type="text" name="obse_cons" id="obse_cons" class="obse_cons"></textarea><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>