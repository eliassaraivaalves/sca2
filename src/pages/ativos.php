<?php
include("layout/header.php");
include("../../config/database.php");

// BUSCA
$busca = "";

if (isset($_GET['busca']) && $_GET['busca'] != "") {
    $busca = $_GET['busca'];

    $sql = "SELECT * FROM ativos WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro SQL: " . $conn->error);
    }

    $like = "%$busca%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();

} else {

    $sql = "SELECT * FROM ativos ORDER BY id DESC";
    $result = $conn->query($sql);

    if (!$result) {
        die("Erro SQL: " . $conn->error);
    }
}
?>

<div class="card">

    <div class="card-topo">
        <h3>Ativos</h3>

        <div class="acoes-topo">
            <form method="GET">
                <input type="text" name="busca" placeholder="Buscar..." value="<?php echo $busca; ?>">
            </form>

            <button onclick="abrirModal()">+ Novo Ativo</button>
        </div>
    </div>

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
            <?php if ($result->num_rows > 0): ?>
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
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum ativo encontrado</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<!-- MODAL -->
<div id="modal" class="modal">
    <div class="modal-content">

        <h3>Novo Ativo</h3>

        <form action="../auth/salvar_ativo.php" method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="tipo" placeholder="Tipo">
            <input type="text" name="patrimonio" placeholder="Patrimônio">

            <select name="status">
                <option value="Ativo">Ativo</option>
                <option value="Manutenção">Manutenção</option>
                <option value="Baixado">Baixado</option>
            </select>

            <button type="submit">Salvar</button>
            <button type="button" onclick="fecharModal()">Cancelar</button>
        </form>

    </div>
</div>

<script>
function abrirModal() {
    document.getElementById("modal").style.display = "flex";
}

function fecharModal() {
    document.getElementById("modal").style.display = "none";
}
</script>

<?php include("layout/footer.php"); ?>