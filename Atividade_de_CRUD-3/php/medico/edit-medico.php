<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM medicos WHERE id_med = ?");
    $query->execute([$id]);
    $medico = $query->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_med = $_POST['nome_med'];
        $especialidade = $_POST['especialidade'];

        $query = $pdo->prepare("UPDATE medicos SET nome_med = ?, especialidade = ? WHERE id_med = ?");
        $query->execute([$nome_med, $especialidade, $id]);
        header("Location: ./view-medico.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de cadastro</title>
</head>
<body>
    <header>
        <h1>
            Edição de cadastro de médico
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./view-medico.php?id=<?= $id ?>" style="margin-left: 10px;">Voltar</a><br><br>
    </header>

    <form action="" method="post">
        <label for="nome_med">nome: </label><br>
        <input type="text" name="nome_med" id="nome_med" value="<?= $medico['nome_med'] ?>" required><br>

        <label for="especialidade">Especialidade: </label><br>
        <input type="text" name="especialidade" id="especialidade" value="<?= $medico['especialidade'] ?>" required><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>