<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../public/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SCA2</title>
    <link rel="stylesheet" href="/sca2/public/css/style.css?v=4">
</head>
<body>

<div class="container">

    <!-- MENU LATERAL -->
    <div class="sidebar">
        <h2>SCA2</h2>

        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="ativos.php">💻 Ativos</a>

        <div class="sidebar-footer">
            <p><?php echo $_SESSION['usuario']; ?></p>
            <a href="../auth/logout.php">Sair</a>
        </div>
    </div>

    <!-- CONTEÚDO -->
    <div class="main">