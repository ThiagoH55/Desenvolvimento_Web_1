<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("DELETE FROM medicos WHERE id_med = ?");
    $query->execute([$id]);
    $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Médico</title>
</head>
<body>

    <p>Médico excluído com sucesso !</p><br>

    <button>
        <a href='./index-medico.php'>Voltar</a>
    </button>
</body>
</html>