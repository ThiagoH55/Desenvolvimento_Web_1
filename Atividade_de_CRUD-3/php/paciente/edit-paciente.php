<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM pacientes WHERE id_pac = ?");
    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_pac = $_POST['nome_pac'];
        $nasc_pac = $_POST['nasc_pac'];
        $tip_sang_pac = $_POST['tip_sang_pac'];

        $query = $pdo->prepare("UPDATE pacientes SET nome_pac = ?, nasc_pac = ?, tip_sang_pac = ? WHERE id_pac = ?");
        $query->execute([$nome_pac, $nasc_pac, $tip_sang_pac, $id]);
        header("Location: ./view-paciente.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de paciente</title>
</head>
<body>
    <header>
        <h1>
            Edição de cadastro de paciente
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./visualiza_paciente.php?id=<?= $paciente['id_pac'] ?>" style="margin-left: 10px">Voltar</a><br><br>
        
    </header>

    <form action="" method="post">
        <label for="nome_pac">nome_pac: </label><br>
        <input type="text" name="nome_pac" id="nome_pac" value="<?= $paciente['nome_pac'] ?>" required><br>

        <label for="nasc_pac">Data de nascimento: </label><br>
        <input type="date" name="nasc_pac" id="nasc_pac" value="<?= $paciente['nasc_pac'] ?>" required><br>

        <label for="tip_sang_pac">Tipo sanguíneo: </label><br>
        <input name="tip_sang_pac" id="tip_sang_pac" required><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>