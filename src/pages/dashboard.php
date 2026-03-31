<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../public/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SCA2 - Dashboard</title>
</head>
<body>

<h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>

<a href="../auth/logout.php">Sair</a>

</body>
</html>