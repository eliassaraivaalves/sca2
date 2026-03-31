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
    <link rel="stylesheet" href="../../public/css/style.css?v=10">
</head>
<body>

<!-- TOPO -->
<div class="topbar">
    <div class="logo">SCA2 Ativos</div>

    <div class="top-icons">
        ⚙️ 🔔 <?php echo $_SESSION['usuario']; ?>
    </div>
</div>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="user">
            <div class="avatar"></div>
            <div>
                <strong><?php echo $_SESSION['usuario']; ?></strong><br>
                <small>Online</small>
            </div>
        </div>

        <input type="text" placeholder="Pesquisar..." class="search">

        <div class="menu-title">NAVEGAÇÃO</div>
        <a href="dashboard.php">🏠 Dashboard</a>

        <div class="menu-title">INVENTÁRIO</div>
        <a href="ativos.php">💻 Ativos</a>

        <div class="menu-title">OUTROS</div>
        <a href="#">📁 Projetos</a>
        <a href="#">🎫 Chamados</a>

        <a href="../auth/logout.php" class="logout">🚪 Sair</a>
    </div>

    <!-- CONTEÚDO -->
    <div class="main">