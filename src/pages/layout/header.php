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
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<div class="topo">
    <h2>SCA2</h2>
    <div class="usuario">
        <?php echo $_SESSION['usuario']; ?> |
        <a href="../auth/logout.php">Sair</a>
    </div>
</div>

<div class="menu">
    <a href="dashboard.php">Dashboard</a>
    <!-- futuramente -->
    <!-- <a href="ativos.php">Ativos</a> -->
</div>

<div class="conteudo">