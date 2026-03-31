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

    <!-- CAMINHO CORRETO -->
    <link rel="stylesheet" href="/sca2/public/css/style.css?v=2">
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
</div>

<div class="conteudo">