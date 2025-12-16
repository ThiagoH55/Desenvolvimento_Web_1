<?php 
    require_once '../config.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("DELETE FROM consulta WHERE id_cons = ?");
    $query->execute([$id]);
    $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de consulta</title>
</head>
<body>

    <p>Consulta excluída com sucesso !</p><br>

    <button>
        <a href='./index-consulta.php'>Voltar</a>
    </button>
</body>
</html>