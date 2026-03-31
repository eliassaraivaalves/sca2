<?php
session_start();
include("../../config/database.php");

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    $_SESSION['usuario'] = $user['nome'];
    $_SESSION['id'] = $user['id'];

    header("Location: ../pages/dashboard.php");
    exit;
} else {
    $_SESSION['erro_login'] = "Usuário ou senha incorretos!";
    header("Location: ../../public/index.php");
    exit;
}
?>