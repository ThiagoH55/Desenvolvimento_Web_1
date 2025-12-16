<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("DELETE FROM pacientes WHERE id_pac = ?");
    $query->execute([$id]);
    $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de paciente</title>
</head>
<body>

    <p>Paciente excluído com sucesso !</p><br>

    <button>
        <a href='./index-paciente.php'>Voltar</a>
    </button>
</body>
</html>