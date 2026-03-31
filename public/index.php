<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SCA2 - Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="login-container">
    <h2>SCA2</h2>

    <?php
    if (isset($_SESSION['erro_login'])) {
        echo "<div class='erro'>" . $_SESSION['erro_login'] . "</div>";
        unset($_SESSION['erro_login']);
    }
    ?>

    <form action="../src/auth/login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>