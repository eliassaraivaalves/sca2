<?php
include("layout/header.php");
include("../../config/database.php");

// Busca de ativos (opcional)
$busca = "";
$sql = "SELECT * FROM ativos ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Erro SQL: " . $conn->error);
}
?>

<div class="card">

    <!-- HEADER DO CARD -->
    <div class="card-header">

        <form method="GET" class="busca-form">
            <input type="text" name="busca" placeholder="Buscar ativo...">
        </form>

        <!-- BOTÃO NOVO CADASTRO -->
        <a href="cadastro_ativo.php" class="btn-primary">
            + Novo Ativo
        </a>

    </div>

    <!-- TABELA -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Patrimônio</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['patrimonio']; ?></td>

                <td>
                    <span class="status <?php echo strtolower($row['status']); ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </td>

                <td>
                    <button class="btn-acao">✏️</button>
                    <button class="btn-acao delete">🗑️</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

<?php include("layout/footer.php"); ?>