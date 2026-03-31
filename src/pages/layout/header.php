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
    <link rel="stylesheet" href="../../public/css/style.css?v=20">
</head>
<body>

<div class="topbar">
    <div class="logo">SCA2</div>

    <div class="user-info">
        <?php echo $_SESSION['usuario']; ?> |
        <a href="../auth/logout.php">Sair</a>
    </div>
</div>

<div class="container">

    <div class="sidebar">
        <h3>Menu</h3>

        <a href="dashboard.php">🏠 Dashboard</a>

        <span class="menu-section">Inventário</span>
        <a href="javascript:void(0);" onclick="document.getElementById('modal-tipo').style.display='flex'">
            💻 Ativos
        </a>

        <span class="menu-section">Outros</span>
        <a href="#">📁 Projetos</a>
        <a href="#">🎫 Chamados</a>
    </div>

    <div class="main">