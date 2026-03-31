<?php
include("layout/header.php");
include("../../config/database.php");

// Busca de ativos
$sql = "SELECT * FROM ativos ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Erro SQL: " . $conn->error);
}
?>

<div class="card">
    <h2>Lista de Ativos</h2>

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

<!-- MODAL DE SELEÇÃO DE TIPO -->
<div id="modal-tipo" class="modal">
    <div class="modal-box">
        <h3>Selecione o Tipo de Ativo</h3>

        <div class="tipo-grid">
            <div class="tipo-item" onclick="abrirCadastro('computador')">💻 Computador</div>
            <div class="tipo-item" onclick="abrirCadastro('impressora')">🖨️ Impressora</div>
            <div class="tipo-item" onclick="abrirCadastro('telefone')">📱 Telefone</div>
            <div class="tipo-item" onclick="abrirCadastro('switch')">🔌 Switch</div>
            <div class="tipo-item" onclick="abrirCadastro('access point')">📡 Access Point</div>
        </div>
    </div>
</div>

<script>
function abrirCadastro(tipo) {
    window.location.href = "cadastro_ativo.php?tipo=" + encodeURIComponent(tipo);
}
</script>

<?php include("layout/footer.php"); ?>