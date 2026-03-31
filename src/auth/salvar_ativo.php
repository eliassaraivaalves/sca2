<?php
include("../../config/database.php");

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$patrimonio = $_POST['patrimonio'];
$status = $_POST['status'];

$sql = "INSERT INTO ativos (nome, tipo, patrimonio, status)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro: " . $conn->error);
}

$stmt->bind_param("ssss", $nome, $tipo, $patrimonio, $status);
$stmt->execute();

header("Location: ../pages/ativos.php");
exit;
?>