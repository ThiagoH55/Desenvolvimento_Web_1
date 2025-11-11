<?php 
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo -> prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt -> execute([$email]);
    if ($stmt -> rowCount() > 0) {
        echo "Já existe uma conta neste email";
    } else {
        $stmt = $pdo -> prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
        if ($stmt -> execute([$username, $email, $password])) {
            echo "Usuário registrado com sucesso!";
            header('Location: user-login.php');
        } else {
            echo "Ocorreu um erro ao tentar criar usuario.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
<body>
    <header>
        <h1>Registrar Usuário</h1>
    </header>
    <main>
        <form method="POST">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registrar</button>
        </form>
    </main>
</body>
</html>