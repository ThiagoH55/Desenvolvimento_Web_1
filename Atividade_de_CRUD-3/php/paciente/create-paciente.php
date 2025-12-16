<?php 
    require_once "../config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_pac = $_POST['nome_pac'];
        $nasc_pac = $_POST['nasc_pac'];
        $tip_sang_pac = $_POST['tip_sang_pac'];

        $query = $pdo -> prepare("INSERT INTO pacientes (nome_pac, nasc_pac, tip_sang_pac) VALUES (?, ?, ?)");
        $query -> execute([$nome_pac, $nasc_pac, $tip_sang_pac]);
        
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

        <label for="nome_pac">Nome: </label>
        <input type="text" name="nome_pac" id="nome_pac"><br>
        
        <label for="nasc_pac">Data de nascimento: </label>
        <input type="date" name="nasc_pac" id="nasc_pac"><br>

        <label for="tip_sang_pac">Tipo sanguíneo </label>
        <input type="text" name="tip_sang_pac" id="tip_sang_pac"><br>
        
        <input type="submit">
    </form>

</body>
</html>

<?php 
    }
?>