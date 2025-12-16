<?php 
    require_once "../config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_med = $_POST['nome_med'];
        $especialidade = $_POST['especialidade'];

        $query = $pdo -> prepare("INSERT INTO medicos (nome_med, especialidade) VALUES (?, ?)");
        $query -> execute([$nome_med, $especialidade]);
        
        header('Location: /index.php');
    } else {
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento</title>
</head>
<body>
    <h1>
        Cadastramento de medico
    </h1>

    <a href="/index.php">Voltar</a><br><br>
    
    <form action="" method="POST">

        <label for="nome_med">Nome: </label>
        <input type="text" name="nome_med" id="nome_med"><br>
        
        <label for="especialidade">E-mail: </label>
        <input type="text" name="especialidade" id="especialidade"><br>
        
        <input type="submit">
    </form>

</body>
</html>

<?php 
    }
?>