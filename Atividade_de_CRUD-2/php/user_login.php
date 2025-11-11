<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo -> prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt -> execute([$email]);
    $user = $stmt -> fetch(PDO :: FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
         $_SESSION['username'] = $user['username'];
        header('Location: /index.php');
    } else {
        echo "Email ou senha estam incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<header>
        <h1>Bem-vindo ao Sistema de Gerenciamento da concessionária CSS</h1>
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/index-aluno.php">Listar Alunos</a></li>
                    <li><a href="/create-aluno.php">Adicionar Aluno</a></li>
                    <li><a href="/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/user-login.php">Login</a></li>
                    <li><a href="/user-register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    
        <h1>Login</h1>
    </header>
    <main>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>
